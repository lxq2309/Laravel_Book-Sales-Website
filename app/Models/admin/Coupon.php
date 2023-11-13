<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Coupon
 *
 * @property $CouponID
 * @property $CouponCode
 * @property $DiscountAmount
 * @property $ExpiryDate
 * @property $IsUsed
 * @property $CreatedDate
 * @property $CreatedBy
 * @property $ModifiedDate
 * @property $ModifiedBy
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Coupon extends Model
{
    protected $table = "Coupon";
    protected $primaryKey = "CouponID";
    static $rules = [
        'CouponCode' => 'required|unique:Coupon',
        'DiscountAmount' => 'required|numeric|max:100',
        'ExpiryDate' => 'required|date|after_or_equal:today',
    ];

    protected $perPage = 20;

    const CREATED_AT = "CreatedDate";
    const UPDATED_AT = "ModifiedDate";

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['CouponCode', 'DiscountAmount', 'ExpiryDate', 'CreatedBy'];

    public function setDiscountAmountAttribute($value)
    {
        $this->attributes['DiscountAmount'] = $value / 100;
    }

    public function getDiscountAmountAttribute()
    {
        if (empty($this->attributes['DiscountAmount']))
        {
            return 0;
        }
        return $this->attributes['DiscountAmount'] * 100;
    }
}
