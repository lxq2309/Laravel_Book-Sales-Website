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
            'userName' =>'required',
            'password' =>'required',
            'email' =>'required|email|unique:User',
            'firstName' =>'required',
            'lastName' =>'required',
            'gender' =>'required',
            'phonenumber' =>'required',
            'dateofbirth' =>'required',
        ]);

        $data['password'] = Hash::make($request->password);
        $data['firstName'] = $request->firstName;
        $data['lastName'] = $request->lastName;
        $data['userName'] = $request->userName;
        $data['gender'] = $request->gender;
        $data['phonenumber'] = $request->phonenumber;
        $data['dateofbirth'] = $request->dateofbirth;

        $user = User::create($data);

        // if(!$user){
        //     echo "failed to create";
        //     // return redirect(route('index'))->with("error", "Registration failed"); 
        // }
        // // return redirect(route('index'))->with("success", "Registration success"); 
        // else {
        //     echo "create successful";
        // }

        if ($user) {
            return response()->json(['success' => true]);
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
