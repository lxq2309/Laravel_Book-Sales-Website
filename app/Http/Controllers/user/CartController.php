<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function cartPage(){
        return view("user.cart-page");
    }

    function addCart(Request $request){
        $userID = Auth::id();
        $cart = ShoppingCart::firstOrNew(['UserID' => $userID]);
        if (!$cart->CartID) {
            $cart->save();
        }
        $cartID = $cart->CartID;
        $bookID = $request->input('book_id');
        $cartItem = ShoppingCartDetail::where('CartID', $cartID)
            ->where('BookID', $bookID)
            ->first();
        if($cartItem) {
            $cartItem->Quantity += 1;
            $cartItem->save();
        } else {
            $cartItem = new ShoppingCartDetail([
                'CartID' => $cartID,
                'BookID' => $bookID,
                'Quantity' => 1,
            ]);
            $cartItem->save();
        }   
    }
}
