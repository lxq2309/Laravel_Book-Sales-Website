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
        if(Auth::check()) {
            $userID = Auth::id();
            $cart = ShoppingCart::firstOrNew(['UserID' => $userID]);
            $cartID = $cart->CartID;
        } else {
            $cartID = session()->get('cartID');
            $cart = ShoppingCart::find($cartID);
            if(!$cart) {
                $cart = new ShoppingCart();
                $cart->save();
                session(['cartID' => $cart->CartID]);
            }
        }

        $bookID = $request->input('book_id');
        $bookQnt = $request->input('book_quantity');
        $cartItem = ShoppingCartDetail::where('CartID', $cartID)
            ->where('BookID', $bookID)
            ->first();
        if($cartItem) {
            if($bookQnt) {
                $cartItem->Quantity += $bookQnt;
            }
            else {    
                $cartItem->Quantity += 1;
            }
            $cartItem->save();
        } else {
            $cartItem = new ShoppingCartDetail([
                'CartID' => $cartID,
                'BookID' => $bookID,
                'Quantity' => $bookQnt ? $bookQnt : 1,
            ]);
            $cartItem->save();
        }
    }

    public function removeFromCart(Request $request)
    {
        if(Auth::check()) {
            $userID = Auth::id();
            $cart = ShoppingCart::firstOrNew(['UserID' => $userID]);
        } else {
            $cartID = session()->get('cartID');
            $cart = ShoppingCart::find($cartID);
            if(!$cart) {
                $cart = new ShoppingCart();
                $cart->save();
                session(['cartID' => $cart->CartID]);
            }
        }

        if (!$cart->CartID) {
            $cart->save();
        }

        $cartID = $cart->CartID;

        $bookID = $request->input('book_id');

        ShoppingCartDetail::where('CartID', $cartID)
            ->where('BookID', $bookID)
            ->delete();

        $cartItems = ShoppingCartDetail::with('book')->where('CartID', $cartID)->get();
        $totalPrice = 0;
        $totalBook = $cartItems->unique('BookID')->count();
        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->Quantity * $cartItem->book?->CostPrice;
        }

        return response()->json(['message' => 'Item removed from the cart', 'totalBookCount' => $totalBook, 'totalPrice' => $totalPrice]);
    }

    public function updateCart(Request $request)
    {
        $request->validate([
            'cart-qty.*' => 'required|numeric',
        ]);

        $cartQuantities = $request->input('cart-qty');
        
        foreach ($cartQuantities as $cartItemID => $quantity) {
            $cartDetail = ShoppingCartDetail::find($cartItemID);
            if ($cartDetail) {
                $cartDetail->update(['Quantity' => $quantity]);
            }
        }

        return redirect()->back()->with('success', 'Cart updated successfully');
    }
}
