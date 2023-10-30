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

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Session::put('user', $user);
            return redirect(route('index'));
        } else {
            return response()->json(['error' => false, 'queries' => $credentials]);
        }
    }

    function registration(Request $request){
        $request->validate([
            'userName' =>'required|unique:User',
            'password' =>'required',
            'email' => [
                'required',
                'email',
                Rule::unique('User')->where(function ($query) use ($request) {
                    return $query->where('email', $request->email);
                }),
            ],
            'firstName' =>'required',
            'lastName' =>'required',
        ]);

        $data['UserName'] = $request->userName;
        $data['password'] = Hash::make($request->password);
        $data['email'] = $request->email;
        $data['FirstName'] = $request->firstName;
        $data['LastName'] = $request->lastName;

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

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('index'));
    }
}
