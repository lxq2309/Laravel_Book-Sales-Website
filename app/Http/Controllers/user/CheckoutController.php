<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\admin\ShippingAddress;
use App\Models\SalesOrder;
use App\Models\ShippingAddress as ModelsShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use App\Models\SalesOrderDetail;

class CheckoutController extends Controller
{
    function checkoutPage(){
        $userId = Session::get('user')->UserID;
        $shippingAddressDefault = ShippingAddress::where('UserID', $userId)->where('IsDefault', 1)->first();
        $shippingAddressList = ShippingAddress::where('UserID', $userId)->get();
        $userID = Auth::id();
        if($userID) {
            $cart = ShoppingCart::firstOrNew(['UserID' => $userID]);
            if (!$cart->CartID) {
                $cart->save();
            }
            $cartID = $cart->CartID;
            $cartItems = ShoppingCartDetail::with('book')->where('CartID', $cartID)->get();
            $totalPrice = 0;
            foreach ($cartItems as $cartItem) {
                $totalPrice += $cartItem->Quantity * $cartItem->book->CostPrice;
            }
        }
        $bookPrice = $totalPrice;
        if($shippingAddressDefault) {
            $totalPrice += 5;
            return view(
                "user.checkout-page", compact('shippingAddressDefault', 'totalPrice', 'bookPrice', 'shippingAddressList'));
        }
        return view(
            "user.checkout-page", compact('totalPrice', 'bookPrice', 'shippingAddressList')
        );
    }

    function checkoutConfirm(Request $request){
        $userID = Auth::id();
        if($userID) {
            $cart = ShoppingCart::firstOrNew(['UserID' => $userID]);
            if (!$cart->CartID) {
                $cart->save();
            }
            $cartID = $cart->CartID;
            $cartItems = ShoppingCartDetail::with('book')->where('CartID', $cartID)->get();
            $totalPrice = 0;
            foreach ($cartItems as $cartItem) {
                $totalPrice += $cartItem->Quantity * $cartItem->book->CostPrice;
            }
        }
        if($totalPrice > 0) {
            $address = ShippingAddress::where(['UserID' => $userID])
                ->where(['Address' => $request->query('shippingAddress')])
                ->first();
            $saleOrders['UserID'] = $userID;
            $saleOrders['OrderStatus'] = 'PENDING';
            $saleOrders['ShippingAddressID'] = $address->AddressID;
            $saleOrders['TotalPrice'] = $totalPrice + 5 - 5;
            $saleOrders['ShippingFee'] = 5;
            $saleOrders['OrderDate'] = Carbon::now();
            $Order = SalesOrder::create($saleOrders);

            foreach ($cartItems as $cartItem) {
                $saleOrdersDetail['OrderID'] = $Order->OrderID;
                $saleOrdersDetail['BookID'] = $cartItem->book->BookID;
                $saleOrdersDetail['QuantitySold'] = $cartItem->Quantity;
                $saleOrdersDetail['Price'] = $cartItem->book->SellingPrice;
                $saleOrdersDetail['SubTotal'] = $cartItem->book->SellingPrice * $cartItem->Quantity;
                SalesOrderDetail::create($saleOrdersDetail);
            }

            $mailData = [
                'title' => 'Đơn hàng mới vừa tạo',
                'body' => 'Thông báo gửi đơn',
                'email' => Session::get('user')->email,
                'cartItem' => $cartItems,
                'totalPrice' => $totalPrice + 5,
                'orderID' => $Order->OrderID,
            ];

            Mail::to(Session::get('user')->email)->send(new OrderMail($mailData));
            
            ShoppingCartDetail::where('CartID', $cartID)->delete();

            return view(
                "user.order-confirm",
                ['cartItems' => $cartItems,
                'totalPrice' => $totalPrice,
                'orderID' => $Order->OrderID],
            );          
        }
    }

    
    public function confirmOrder(Request $request){
        $order = SalesOrder::where(['OrderID' => $request->orderID])->first();
        $order->OrderStatus = 'SHIPPING';
        $order->save();
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
}
