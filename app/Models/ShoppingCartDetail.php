<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCartDetail extends Model
{
    use HasFactory;

    protected $table = "ShoppingCartDetail";

    protected $primaryKey = "CartItemID";

    public $timestamps = false;

    public function book()
    {
        return $this->belongsTo(Book::class, 'BookID', 'BookID');
    }

    protected $fillable = [
        'CartID',
        'BookID',
        'Quantity',
    ];
}
