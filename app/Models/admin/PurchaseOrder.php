<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PurchaseOrder
 *
 * @property $OrderID
 * @property $OrderDate
 * @property $SupplierID
 * @property $TotalPrice
 *
 * @property Purchaseorderdetail $purchaseorderdetail
 * @property Supplier $supplier
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PurchaseOrder extends Model
{
    protected $table = "PurchaseOrder";
    protected $primaryKey = "OrderID";
    static $rules = [
        'OrderDate' => 'required',

    ];

    protected $perPage = 20;

    public $timestamps = false;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['OrderDate', 'SupplierID', 'TotalPrice'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function purchaseorderdetail()
    {
        return $this->hasMany('App\Models\admin\PurchaseOrderDetail', 'OrderID', 'OrderID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function supplier()
    {
        return $this->hasOne('App\Models\admin\Supplier', 'SupplierID', 'SupplierID');
    }

    public function getTotalPriceAttribute()
    {
        if (empty($this->attributes['TotalPrice']))
        {
            return 0;
        }
        return $this->attributes['TotalPrice'] * 1000;
    }

    public function setTotalPriceAttribute($val)
    {
        $this->attributes['TotalPrice'] = $val / 1000;
    }
}
