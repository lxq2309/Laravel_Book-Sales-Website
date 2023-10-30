<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function AccountDetail(){
        return view("user.account-detail");
    }

    public function updateAccount(Request $request)
    {
        $validatedData = $request->validate([
            'userName' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'dateOfBirth' => 'nullable|date',
            'phoneNumber' => 'nullable|regex:/[0-9]{10}/',
            'gender' => 'nullable|in:Male,Female,Other',
        ]);
        // Update the user's account details
        $user = Session::get('user');
        $user->UserName = $validatedData['userName'];
        $user->FirstName = $validatedData['firstName'];
        $user->LastName = $validatedData['lastName'];
        $user->DateOfBirth = $validatedData['dateOfBirth'];
        $user->PhoneNumber = $validatedData['phoneNumber'];
        $user->Gender = $validatedData['gender'];

        // Save the updated user data
        $user = Session::get('user');
        $user->UserName = $validatedData['userName'];
        $user->FirstName = $validatedData['firstName'];
        $user->LastName = $validatedData['lastName'];

        if (isset($validatedData['dateOfBirth'])) {
            $user->DateOfBirth = $validatedData['dateOfBirth'];
        }

        if (isset($validatedData['phoneNumber'])) {
            $user->PhoneNumber = $validatedData['phoneNumber'];
        }

        if (isset($validatedData['gender'])) {
            $user->Gender = $validatedData['gender'];
        }

        // Redirect back with a success message or perform any other action you desire
        return redirect()->back()->with('success', 'Account details updated successfully');
    }
}
