<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\admin\ShippingAddress;
use App\Models\ShippingAddress as ModelsShippingAddress;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function AccountDetail(){
        $userId = Session::get('user')->UserID;
        $shippingAddress = ShippingAddress::where('UserID', $userId)->first();
        if($shippingAddress) {
            return view("user.account-detail", ['shippingAddress' => $shippingAddress->Address]);
        }
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
            'new-pass' => 'nullable',
            'new-pass-confirm' => 'nullable',
            'address' => 'nullable',
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

        if($validatedData['new-pass']) {
            if($validatedData['new-pass'] === $validatedData['new-pass-confirm']) {
                $user->Password = Hash::make($validatedData['new-pass']);
            } else {
                return response()->json(['error' => true, 'message' => 'password not same']);
            }
        }

        $user->save();

        $userId = Session::get('user')->UserID;
        $address = ShippingAddress::where('UserID', $userId)->first();
        if(!empty($address)) {
            $address->Address = $address;
            $address->save();
        } else {
            $addressData['UserID'] = $userId;
            $addressData['Address'] = $validatedData['address'];
            $address = ShippingAddress::create($addressData);
        }
    }
}
