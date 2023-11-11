<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\admin\Coupon;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function applyCoupon(Request $request){
        $couponCode = $request->input('coupon_code');
        $coupon = Coupon::where('CouponCode', $couponCode)->first();
        if ($coupon) {
            if (!$coupon->IsUsed && Carbon::now() <= $coupon->ExpiryDate) {
                $coupon->IsUsed = 1;
                $coupon->save();

                return response()->json(['message' => 'Đã sử dụng mã giảm giá'], 200);
            } else {
                return response()->json(['message' => $coupon->IsUsed], 400);
            }
        } else {
            return response()->json(['message' => 'Mã giảm giá không tồn tại'], 404);
        }
    }
}
