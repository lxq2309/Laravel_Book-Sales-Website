<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\admin\Coupon;
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
    function checkoutPage(Request $request)
    {
        $couponCode = $request->input('couponCode');
        $coupon = Coupon::where('CouponCode', $couponCode)->first();
        $userId = Session::get('user')->UserID;
        $shippingAddressDefault = ShippingAddress::where('UserID', $userId)->where('IsDefault', 1)->first();
        $shippingAddressList = ShippingAddress::where('UserID', $userId)->get();
        $userID = Auth::id();
        if ($userID) {
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

        if ($shippingAddressDefault) {
            $totalPrice += 5;
            if ($couponCode) {
                $totalPrice = $totalPrice * (1 - ($coupon->DiscountAmount / 100));
                $totalPrice = round($totalPrice, 2);
                $discount = $totalPrice - ($bookPrice + 5);
                $discount = round($discount, 2);
                $totalPriceDiscount = $totalPrice;
                return view(
                    "user.checkout-page", compact('shippingAddressDefault', 'totalPriceDiscount', 'bookPrice', 'shippingAddressList', 'discount', 'couponCode'));
            }
            return view(
                "user.checkout-page", compact('shippingAddressDefault', 'totalPrice', 'bookPrice', 'shippingAddressList', 'couponCode'));
        }
        if ($couponCode) {
            $totalPrice = $bookPrice * (1 - ($coupon->DiscountAmount / 100));
            $totalPrice = round($totalPrice, 2);
            $discount = $totalPrice - $bookPrice;
            $discount = round($discount, 2);
            return view(
                "user.checkout-page", compact('totalPrice', 'bookPrice', 'discount', 'couponCode')
            );
        }
        return view(
            "user.checkout-page", compact('totalPrice', 'bookPrice', 'shippingAddressList', 'couponCode')
        );
    }

    function checkoutConfirm(Request $request)
    {

        $couponCode = $request->input('couponCode');
        $coupon = Coupon::where('CouponCode', $couponCode)->first();
        $userID = Auth::id();
        if ($userID) {
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
        if ($couponCode && $coupon && !$coupon->IsUsed) {
            $totalPriceOld = $totalPrice + 5;
            $discountAmount = $coupon->DiscountAmount / 100;
            $discount = $totalPriceOld * $discountAmount;
            $totalPrice = round($totalPriceOld - $discount, 2);

            $coupon->IsUsed = 1;
            $coupon->save();

            $saleOrders['Discount'] = $discountAmount;
        } else {
            $saleOrders['Discount'] = 0;
        }

        if ($totalPrice > 0) {
            $address = ShippingAddress::where(['UserID' => $userID])
                ->where(['Address' => $request->query('shippingAddress')])
                ->first();
            $saleOrders['UserID'] = $userID;
            $saleOrders['OrderStatus'] = 'PENDING';
            $saleOrders['ShippingAddressID'] = $address->AddressID;
            $saleOrders['TotalPrice'] = $totalPrice;
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
                'totalPrice' => $totalPrice,
                'orderID' => $Order->OrderID,
            ];

            Mail::to(Session::get('user')->email)->send(new OrderMail($mailData));

            ShoppingCartDetail::where('CartID', $cartID)->delete();

            return view(
                "user.order-confirm",
                ['cartItems' => $cartItems,
                    'totalPrice' => $totalPrice,
                    'bookPrice' => $bookPrice,
                    'orderID' => $Order->OrderID],
            );
        }
    }


    public function cancelOrder(Request $request)
    {
        $order = SalesOrder::where('OrderID', $request->orderID)->first();
        $order->salesOrderDetails()->delete();
        $order->delete();
        $userId = Session::get('user')->UserID;
        $addresses = ShippingAddress::where('UserID', $userId)->count();
        $shippingAddressList = ShippingAddress::where('UserID', $userId)->get();
        $order = SalesOrder::where('UserID', $userId)
            ->Where('OrderStatus', '!=', 'COMPLETED')
            ->get();
        if ($shippingAddressList) {
            return view("user.account-detail", ['numberAdd' => $addresses, 'shippingAddressList' => $shippingAddressList, 'orders' => $order]);
        }
        return view("user.account-detail", ['numberAdd' => $addresses, 'orders' => $order]);
    }
}
