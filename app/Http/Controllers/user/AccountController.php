<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\admin\ShippingAddress;
use App\Models\SalesOrder;
use App\Models\ShippingAddress as ModelsShippingAddress;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function AccountDetail(){
        $userId = Session::get('user')->UserID;
        $addresses = ShippingAddress::where('UserID', $userId)->count();
        $shippingAddressList = ShippingAddress::where('UserID', $userId)->get();
        $order = SalesOrder::where('UserID', $userId)
            ->Where('OrderStatus', '!=', 'COMPLETED')
            ->get();
        if($shippingAddressList) {
            return view("user.account-detail", ['numberAdd' => $addresses, 'shippingAddressList' => $shippingAddressList, 'orders' => $order]);
        }
        return view("user.account-detail", ['numberAdd' => $addresses, 'orders' => $order]);
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

    }

    public function AddAddress(){
        return view('user.add-address');
    }

    public function AddNewAddress(Request $request){
        $data = $request->json()->all();

        $userID = $data['userID'];

        $shippingAddressCount = DB::table('ShippingAddress')->where('UserID', $userID)->count();
        if($shippingAddressCount >= 3){
            return response()->json(['message' => 'Mỗi tài khoản chỉ có tối đa 3 địa chỉ']);
        }

        $addressAdd['UserID'] = $userID;
        $addressAdd['FullName'] = $data['name'];
        $addressAdd['City'] = $data['city'];
        $addressAdd['District'] = $data['district'];
        $addressAdd['Ward'] = $data['ward'];
        $addressAdd['Address'] = $data['address'];
        $addressAdd['PhoneNumber'] = $data['phone'];
        $addressAdd['IsDefault'] = $data['defaultCheckbox'] == true ? 1 : 0;

        if($data['defaultCheckbox']){
            $shippingAddress = ShippingAddress::where('UserID', $userID)->get();
            foreach($shippingAddress as $address)
            $address->update([
                'IsDefault' => 0
            ]);
        }

        ShippingAddress::create($addressAdd);

        return response()->json(['message' => 'Đã thêm thành công', 'status' => 200]);
    }

    public function AddressList(){
        $userID = Session::get('user')->UserID;
        $addresses = ShippingAddress::where('UserID', $userID)->get();
        return view('user.address-list', compact('addresses'));
    }

    public function getAddressByID($addressID){
        $data = ShippingAddress::where('AddressID', $addressID)->get();
        return $data;
    }

    public function updateAddress(Request $request){
        $data = $request->all();
        $userID = $data['userID'];

        $addressID = $data['addressID'];


        $address = ShippingAddress::find($addressID);

        $address['UserID'] = $userID;
        $address['FullName'] = $data['name'];
        $address['City'] = $data['city'];
        $address['Address'] = $data['address'];
        $address['PhoneNumber'] = $data['phone'];
        $address['District'] = $data['district'];
        $address['Ward'] = $data['ward'];
        $address['IsDefault'] = $data['isDefault'] == true ? 1 : 0;

        if($data['isDefault']){
            ShippingAddress::where('UserID', $userID)->where('AddressID', '!=', $addressID)->update(['IsDefault' => 0]);
        }

        $address->save();

        return response()->json(['message' => 'Đã lưu thành công', 'status' => 200]);
    }
}
