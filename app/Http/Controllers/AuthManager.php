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
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // return response()->json(['success' => true, 'queries' => $credentials]);
            return redirect(route('index'));
        } else {
            return response()->json(['error' => false, 'queries' => $credentials]);
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

        $data['UserName'] = $request->userName;
        $data['Password'] = Hash::make($request->password);
        $data['Email'] = $request->email;
        $data['FirstName'] = $request->firstName;
        $data['LastName'] = $request->lastName;

        $user = User::create($data);

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
