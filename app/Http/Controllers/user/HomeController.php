<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $genres = DB::table("Genre")->take(3)->get();
        $books = DB::table("Book")->take(10)->get();
        return view("user.index", compact('books', 'genres'));
    }

}
