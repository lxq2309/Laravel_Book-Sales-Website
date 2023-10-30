<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function AccountDetail(){
        return view("user.account-detail");
    }

    public function updateAccount(Request $request)
    {
        $user = Session::get('user');

        $validatedData = $request->validate([
            'userName' => [
                'required',
            ],
            'firstName' => 'required',
            'lastName' => 'required',
            'dateOfBirth' => 'nullable|date',
            'phoneNumber' => [
                'nullable',
                'regex:/[0-9]{10}/',
            ],
            'gender' => 'nullable|in:Male,Female,Other',
        ]);

        // Save the updated user data
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

        $user->save();

        return redirect()->back()->with('success', 'Account details updated successfully');
    }
}
