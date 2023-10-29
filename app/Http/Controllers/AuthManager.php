<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        // if(Auth::attempt($credentials)){
        //     return redirect()->intended(route('index'));
        // }

        // return redirect(route('index'))->with("error", "Login details are not valid");

        if (Auth::attempt($credentials)) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'error' => 'Registration failed']);
        }
    }

    function registration(Request $request){
        $request->validate([
            'userName' =>'required',
            'password' =>'required',
            'email' =>'required|email|unique:User',
            'firstName' =>'required',
            'lastName' =>'required',
        ]);

        DB::enableQueryLog();

        $data['UserName'] = $request->userName;
        $data['Password'] = Hash::make($request->password);
        $data['Email'] = $request->email;
        $data['FirstName'] = $request->firstName;
        $data['LastName'] = $request->lastName;

        $user = User::create($data);

        if (!$user) {
            return redirect(route('index'))->with("error", "Registration failed");
        } 

        return redirect(route('index'))->with("success", "Registration success");
    }  

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('index'));
    }
}
