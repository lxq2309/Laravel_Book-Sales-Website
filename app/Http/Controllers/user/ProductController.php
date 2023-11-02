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

    //Tim kiem cho thanh input search
    public function searchProduct(Request $request){
        $textSearch = $request->input('keyWord');



        $products = DB::table("Book")
            ->join('Publisher', "Book.PublisherID","=","Publisher.PublisherID")
            ->where('BookTitle', 'like', '%' . $textSearch . '%')
            ->orWhere('Author', 'like', '%' . $textSearch . '%')
            ->orWhere('PublisherName', 'like', '%' . $textSearch . '%')
            ->orderBy('Book.BookTitle', 'asc')
            ->take(10)->get();
//        $products = DB::table("Book")
//            ->where('BookTitle', 'like', '%' . $textSearch . '%')
//            ->orWhere('Author', 'like', '%' . $textSearch . '%')
//            ->orWhere('Author', 'like', '%' . $textSearch . '%')
//            ->take(10)->get();



        if ($textSearch) {
            return view('user.product-category', compact('products', 'textSearch'));
        } else {
            return view('user.product-category', compact('products'));
        }

    }

    //Tim kiem theo bo loc
    public function searchByFilter(Request $request)
    {
        // Nhận dữ liệu từ yêu cầu POST
        $dataRequest = $request->json()->all();



        $data = json_decode(json_encode($dataRequest));



        // Khởi tạo mảng điều kiện truy vấn
        $conditions = [];

        foreach ($data->checkboxes as $checkbox) {
            $id = $checkbox->id;
            $name = $checkbox->name;

            if (strpos($name, 'group-1') !== false) {
                // Xử lý checkbox thuộc group giá cả
                if ($id === 'price-1') {
                    $conditions[] = ['column' => 'SellingPrice', 'operator' => '<=', 'value' => 25];
                } elseif ($id === 'price-2') {
                    $conditions[] = ['column' => 'SellingPrice', 'operator' => '>', 'value' => 25];
                    $conditions[] = ['column' => 'SellingPrice', 'operator' => '<=', 'value' => 50];
                } elseif ($id === 'price-3') {
                    $conditions[] = ['column' => 'SellingPrice', 'operator' => '>', 'value' => 50];
                    $conditions[] = ['column' => 'SellingPrice', 'operator' => '<=', 'value' => 75];
                } elseif ($id === 'price-4') {
                    $conditions[] = ['column' => 'SellingPrice', 'operator' => '>', 'value' => 75];
                }
            } elseif (strpos($name, 'group-2') !== false) {
                // Xử lý checkbox thuộc group tác giả
                $conditions[] = ['column' => 'Author', 'operator' => '=', 'value' => $id];
            } elseif (strpos($name, 'group-3') !== false) {
                // Xử lý checkbox thuộc group nhà xuất bản
                $conditions[] = ['column' => 'Book.PublisherID', 'operator' => '=', 'value' => $id];
            }
        }

        // Khởi tạo truy vấn
        $query = DB::table('Book');
        if (!empty($conditions) && $data->sort === 'p-name') {
            $query->join('getListBookSoldDesc', 'getListBookSoldDesc.BookID', '=', 'Book.BookID');
            $query->join('Publisher', 'Book.PublisherID', '=', 'Publisher.PublisherID');
            foreach ($conditions as $condition) {
                $query->where($condition['column'], $condition['operator'], $condition['value']);
            }
            $query->select('Book.*', 'getListBookSoldDesc.TotalSold', 'Publisher.*')
                ->orderByDesc('getListBookSoldDesc.TotalSold');
        } elseif (!empty($conditions) && $data->sort === 'p-price') {
            $query->join('Publisher', 'Book.PublisherID', '=', 'Publisher.PublisherID');
            foreach ($conditions as $condition) {
                $query->where($condition['column'], $condition['operator'], $condition['value']);
            }
                $query->orderBy('Book.SellingPrice', 'asc');
        } elseif (empty($conditions) && $data->sort === 'p-name'){
            $query->join('getListBookSoldDesc', 'getListBookSoldDesc.BookID', '=', 'Book.BookID');
            $query->select('Book.*', 'getListBookSoldDesc.TotalSold')
                ->orderByDesc('getListBookSoldDesc.TotalSold');
        } elseif (empty($conditions) && $data->sort === 'p-price'){
            $query->orderBy('Book.SellingPrice', 'asc');
        }


        $results = $query->take(1000)->get();

        return response()->json(['results' => $results]);
    }


}
