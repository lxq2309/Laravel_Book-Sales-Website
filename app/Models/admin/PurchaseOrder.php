<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PurchaseOrder
 *
 * @property $OrderID
 * @property $OrderDate
 * @property $SupplierID
 * @property $OrderStatus
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
        'OrderID' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['OrderID', 'OrderDate', 'SupplierID', 'OrderStatus', 'TotalPrice'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function purchaseorderdetail()
    {
        return $this->hasOne('App\Models\admin\PurchaseOrderDetail', 'OrderID', 'OrderID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function supplier()
    {
        return $this->hasOne('App\Models\admin\Supplier', 'SupplierID', 'SupplierID');
    }


}
