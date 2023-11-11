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
        $randomBooks = DB::table('Book')->join('avgRatingBook', 'Book.BookID', '=', 'avgRatingBook.BookID')
            ->take(10)->inRandomOrder()->get();
//dd($randomBooks);

        return view("user.index", compact('randomBooks'));
    }
}
