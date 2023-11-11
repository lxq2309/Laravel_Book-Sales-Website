<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\SendMail;
use App\Models\ShoppingCartDetail;

class AuthManager extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if (empty($user)) {
            return response()->json(['error' => true, 'message' => 'Email does not exist']);
        } else {
            $localCartID = session()->get('cartID');
            if ($localCartID) {
                $localCartItems = ShoppingCartDetail::with('book')->where('CartID', $localCartID)->get();
                if (Auth::attempt(['email' => $email, 'password' => $password])) {
                    $user = Auth::user();
                    Session::put('user', $user);
                    $userID = Auth::id();
                    $cart = ShoppingCart::firstOrNew(['UserID' => $userID]);
                    $cartID = $cart->CartID;
                    
                    foreach ($localCartItems as $item) {
                        $bookID = $item->book->BookID;
                        $bookQnt = $item->Quantity;
                        $cartItem = ShoppingCartDetail::where('CartID', $cartID)
                            ->where('BookID', $bookID)
                            ->first();
                        if($cartItem) {
                            if($bookQnt) {
                                $cartItem->Quantity += $bookQnt;
                            }
                            else {    
                                $cartItem->Quantity += 1;
                            }
                            $cartItem->save();
                        } else {
                            $cartItem = new ShoppingCartDetail([
                                'CartID' => $cartID,
                                'BookID' => $bookID,
                                'Quantity' => $bookQnt ? $bookQnt : 1,
                            ]);
                            $cartItem->save();
                        }   
                    }
                    return response()->json(['error' => false, 'message' => 'Login successful', 'user' => $user]);
                } else {
                    return response()->json(['error' => true, 'message' => 'Invalid password', 'user' => $user]);
                }
            }
        }
    }

    function registration(Request $request){
        $request->validate([
            'userName' =>'required',
            'password' =>'required',
            'email' => 'required',
            'firstName' =>'required',
            'lastName' =>'required',
        ]);

        $data['UserName'] = $request->userName;
        $data['password'] = Hash::make($request->password);
        $data['email'] = $request->email;
        $data['FirstName'] = $request->firstName;
        $data['LastName'] = $request->lastName;

        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if (! empty($user)) {
            return response()->json(['error' => true, 'message' => 'Email existed']);
        } else {
            $userName = $request->input('userName');
            $user = User::where('UserName', $userName)->first();
            if (! empty($user)) {
                return response()->json(['error' => true, 'message' => 'userName existed']);
            }
            else {
                $user = User::create($data);
                if ($user) {
                    $cartData['UserID'] = $user->UserID;
                    ShoppingCart::create($cartData);
                    Auth::login($user);
                    $user = Auth::user();
                    Session::put('user', $user);
                    return redirect(route('index'));
                } else {
                    return response()->json(['success' => false, 'error' => 'Registration failed']);
                }
            }
        }
    }

    function forgotPass(){
        return view("user.forgot-password");
    }

    function confirmEmail(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withInput()->with('error', 'Không tồn tại người dùng với Email này');
        }

        $confirmationCode = Str::random(6);
        $user->ConfirmCode = $confirmationCode;
        $user->save();

        $mailData = [
            'title' => 'Xác nhận Email',
            'body' => 'Mã xác nhận Email: ',
            'confirmationCode' => $confirmationCode,
            'email' => $request->email,
        ];

        Mail::to($request->email)->send(new SendMail($mailData));

        return view("user.reset-password", compact('mailData'));
    }

    function changePassword(Request $request){
        $user = User::where('email', $request->email)->first();

        if($user->ConfirmCode == $request->confirmCode) {
            if($request->password == $request->cfpassword) {
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect(route('index'));
            }
            return back()->withInput()->with('errorPass', 'Vui lòng nhập 2 mật khẩu giống nhau');
        }
        return back()->withInput()->with('errorCode', 'Sai mã xác nhận');
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('index'));
    }
}
