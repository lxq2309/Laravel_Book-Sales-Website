<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;

    protected $table = "SalesOrder";

    protected $primaryKey = 'OrderID';

    public $timestamps = false;

    public function salesOrderDetails()
    {
        return $this->hasMany(SalesOrderDetail::class, 'OrderID');
    }

    protected $fillable = [
        'OrderDate',
        'UserID',
        'OrderStatus',
        'ShippingAddressID',
        'ShippingFee',
        'OrderNote',
        'Discount',
        'TotalPrice',
    ];
}
