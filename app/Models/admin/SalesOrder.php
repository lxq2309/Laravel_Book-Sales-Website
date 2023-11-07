<?php

namespace App\Models\admin;

use App\Models\Shippingaddress;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesOrder
 *
 * @property $OrderID
 * @property $OrderDate
 * @property $UserID
 * @property $OrderStatus
 * @property $ShippingAddressID
 * @property $ShippingFee
 * @property $OrderNote
 * @property $Discount
 * @property $TotalPrice
 *
 * @property Salesorderdetail $salesorderdetail
 * @property Shippingaddress $shippingaddress
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SalesOrder extends Model
{
    protected $table = "SalesOrder";
    protected $primaryKey = "OrderID";
    static $rules = [
        'OrderID' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['OrderID', 'OrderDate', 'UserID', 'OrderStatus', 'ShippingAddressID', 'ShippingFee', 'OrderNote', 'Discount', 'TotalPrice'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salesorderdetail()
    {
        return $this->hasMany('App\Models\admin\SalesOrderDetail', 'OrderID', 'OrderID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shippingaddress()
    {
        return $this->hasOne('App\Models\admin\ShippingAddress', 'AddressID', 'ShippingAddressID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\admin\User', 'UserID', 'UserID');
    }


}
