<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function ProductCategory(){
        $products = DB::table('Book')
            ->join('avgRatingBook', 'Book.BookID', '=', 'avgRatingBook.BookID')->paginate(9);
        return view("user.product-category", compact('products'));
    }
}
