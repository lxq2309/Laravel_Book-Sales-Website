<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    public function login(Request $request)
    {
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
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                $user = Auth::user();
                Session::put('user', $user);
            } else {
                return response()->json(['error' => true, 'message' => 'Invalid password', 'user' => $user]);
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

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('index'));
    }
}
