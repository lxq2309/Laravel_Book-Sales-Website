<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login(Request $request){
        $request->validate([
            'email' =>'required',
            'password' =>'required',
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('index'));
        }

        return redirect(route('index'))->with("error", "Login details are not valid");
    }

    function registration(Request $request){
        $request->validate([
            'email' =>'required|email|unique:user',
            'password' =>'required',
            'firstName' =>'required',
            'lastName' =>'required',
            'userName' =>'required',
            'gender' =>'required',
            'phone' =>'required',
            'dob' =>'required',
        ]);

        $data['name'] = $request->name;
        $data['password'] = Hash::make($request->password);
        $data['firstName'] = $request->firstName;
        $data['lastName'] = $request->lastName;
        $data['userName'] = $request->userName;
        $data['gender'] = $request->gender;
        $data['phone'] = $request->phone;
        $data['dob'] = $request->dob;

        $user = User::create($data);

        if(!$user){
            echo "failed to create";
            // return redirect(route('index'))->with("error", "Registration failed"); 
        }
        // return redirect(route('index'))->with("success", "Registration success"); 
        else {
            echo "create successful";
        }

        function logout(){
            Session::flush();
            Auth::logout();
            return redirect(route('index'));
        }

    }

}
