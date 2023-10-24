<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $books = DB::table("Book")->get();
        return view("user.index", ["books" => $books]);
    }

    public function getCategory(){
        $categories = DB::table("Category")->get();
    }
}
