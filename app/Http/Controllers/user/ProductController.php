<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function ProductDetail(Request $request, $id){
        $books = DB::table("Book")->where("BookId",$id)->get();
        return view("user.product-detail", ["books"=> $books]);
    }

    public function getProductByID(Request $request, $productID){
        $products = DB::table("Book")->where("BookId",$productID)->get();
        return response()->json(["products" => $products]);
    }

    public function getProductsByCategory(Request $request, $genreID){
        $products = DB::table("Book")
        ->join("BookGenre","Book.BookID","=","BookGenre.BookID")
        ->join("Genre","BookGenre.GenreID","=","Genre.GenreID")
        ->where("BookGenre.GenreID",$genreID)
        ->orderBy("BookGenre.GenreID","asc")
        ->take(10)->get();

        return response()->json(['products'=>$products]);
    }
}
