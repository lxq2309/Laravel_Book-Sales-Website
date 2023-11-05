<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartDetail;
use App\Models\Book;
use Faker\Core\Number;
use Nette\Utils\Arrays;

class HomeController extends Controller
{
    public function index()
    {
        $genres = DB::table("Genre")->take(3)->get();
        $books = DB::table("Book")->take(10)->get();
        return view("user.index", compact('books', 'genres'));
    }
}
