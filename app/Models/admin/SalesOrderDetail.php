<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesOrderDetail
 *
 * @property $OrderID
 * @property $BookID
 * @property $QuantitySold
 * @property $Price
 * @property $SubTotal
 *
 * @property Book $book
 * @property Salesorder $salesorder
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SalesOrderDetail extends Model
{
    protected $table = "SalesOrderDetail";
    protected $primaryKey = ["OrderID", "BookID"];
    public $incrementing = false;
    static $rules = [
        'OrderID' => 'required',
        'BookID' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['OrderID', 'BookID', 'QuantitySold', 'Price', 'SubTotal'];


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
    public function salesorder()
    {
        return $this->hasOne('App\Models\admin\SalesOrder', 'OrderID', 'OrderID');
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
