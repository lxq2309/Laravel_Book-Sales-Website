<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrderDetail extends Model
{
    use HasFactory;

    protected $table = "SalesOrderDetail";

    public $timestamps = false;

    protected $fillable = [
        'OrderID',
        'BookID',
        'QuantitySold',
        'Price',
        'SubTotal',
    ];
}
