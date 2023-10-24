<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function ProductDetail(string $id){
        $books = DB::table("Book")->where("BookId",$id)->get();
        return view("user.product-detail", ["books"=> $books]);
    }
}
