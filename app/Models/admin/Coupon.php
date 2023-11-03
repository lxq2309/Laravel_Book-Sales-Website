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
    'CouponID' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['CouponID', 'CouponCode', 'DiscountAmount', 'ExpiryDate', 'IsUsed', 'CreatedDate', 'CreatedBy', 'ModifiedDate', 'ModifiedBy'];



}
