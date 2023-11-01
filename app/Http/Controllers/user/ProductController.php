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

    public function productsByCategory(Request $request, $genreID){
        $products = DB::table("Book")
            ->join("BookGenre","Book.BookID","=","BookGenre.BookID")
            ->join("Genre","BookGenre.GenreID","=","Genre.GenreID")
            ->where("BookGenre.GenreID",$genreID)
            ->orderBy("BookGenre.GenreID","asc")
            ->take(10)->get();

        return view('user.product-category', compact('products'));
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

    public function searchProduct(Request $request){
        $textSearch = $request->input('keyWord');
        $products = DB::table("Book")
            ->join("BookGenre","Book.BookID","=","BookGenre.BookID")
            ->join("Genre","BookGenre.GenreID","=","Genre.GenreID")
            ->join('Publisher', "Book.PublisherID","=","Publisher.PublisherID")
            ->where('BookTitle', 'like', '%' . $textSearch . '%')
            ->orWhere('Author', 'like', '%' . $textSearch . '%')
            ->orWhere('PublisherName', 'like', '%' . $textSearch . '%')
            ->orWhere('Genre.GenreName', 'like', '%' . $textSearch . '%')
            ->orderBy('Book.BookTitle', 'asc')
            ->take(10)->get();
//        $products = DB::table("Book")
//            ->where('BookTitle', 'like', '%' . $textSearch . '%')
//            ->orWhere('Author', 'like', '%' . $textSearch . '%')
//            ->orWhere('Author', 'like', '%' . $textSearch . '%')
//            ->take(10)->get();

        return view('user.product-category', compact('products'));

    }



}
