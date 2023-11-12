<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PurchaseOrderDetail
 *
 * @property $OrderID
 * @property $BookID
 * @property $QuantityReceived
 * @property $Price
 * @property $SubTotal
 *
 * @property Book $book
 * @property Purchaseorder $purchaseorder
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PurchaseOrderDetail extends Model
{
    protected $table = "PurchaseOrderDetail";
    protected $primaryKey = ["OrderID", "BookID"];
    public $incrementing = false;
    static $rules = [

    ];

    protected $perPage = 20;

    public $timestamps = false;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['OrderID', 'BookID', 'QuantityReceived', 'Price', 'SubTotal'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function book()
    {
        return $this->hasOne('App\Models\admin\Book', 'BookID', 'BookID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function purchaseorder()
    {
        return $this->hasOne('App\Models\admin\PurchaseOrder', 'OrderID', 'OrderID');
    }

    public function getPriceAttribute()
    {
        if (empty($this->attributes['Price']))
        {
            return 0;
        }
        return $this->attributes['Price'] * 1000;
    }

    public function setPriceAttribute($val)
    {
        $this->attributes['Price'] = $val / 1000;
    }

    public function getSubTotalAttribute()
    {
        if (empty($this->attributes['SubTotal']))
        {
            return 0;
        }
        return $this->attributes['SubTotal'] * 1000;
    }

    public function setSubTotalAttribute($val)
    {
        $this->attributes['SubTotal'] = $val / 1000;
    }
}
