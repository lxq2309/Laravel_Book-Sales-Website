<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\admin\Coupon;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function applyCoupon(Request $request){
        $data = $request->all();
        $totalPriceOld = floatval($data['totalPrice']);
        $couponCode = $data['couponCode'];

        $coupon = Coupon::where('CouponCode', $couponCode)->first();
        if ($coupon) {
            if (!$coupon->IsUsed && Carbon::now() <= $coupon->ExpiryDate) {
//                $coupon->IsUsed = 1;
//                $coupon->save();

                $totalPrice = $totalPriceOld * (1-($coupon->DiscountAmount/100));

                $totalPrice = round($totalPrice, 2);
                $discount = $totalPrice - $totalPriceOld;
                $discount = round($discount, 2);
                return response()->json(['message' => 'Áp dụng thành công', 'totalPrice' => $totalPrice, 'discount' => $discount, 'status' => 200]);
            } else {
                return response()->json(['message' => 'Mã đã được sử dụng hoặc hết hạn', 'status' => 400]);
            }
        } else {
            return response()->json(['message' => 'Mã giảm giá không tồn tại', 'status' => 400]);
        }
    }
}
