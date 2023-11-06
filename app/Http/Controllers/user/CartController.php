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
        $userID = Auth::id();
        $cart = ShoppingCart::firstOrNew(['UserID' => $userID]);

        if (!$cart->CartID) {
            $cart->save();
        }

        $cartID = $cart->CartID;

        // Get the BookID that you want to remove
        $bookID = $request->input('book_id');

        // Remove rows with the same BookID and CartID
        ShoppingCartDetail::where('CartID', $cartID)
            ->where('BookID', $bookID)
            ->delete();

        $totalBookCount = ShoppingCartDetail::where('CartID', $cartID)->distinct()->count('BookID');

        return response()->json(['message' => 'Item removed from the cart', 'totalBookCount' => $totalBookCount]);
    }

    public function updateCart(Request $request)
    {
        $request->validate([
            'cart-qty.*' => 'required|numeric',
        ]);

        $cartQuantities = $request->input('cart-qty');
        
        // Loop through the cart items and update the quantities in the database.
        foreach ($cartQuantities as $cartItemID => $quantity) {
            $cartDetail = ShoppingCartDetail::find($cartItemID);
            if ($cartDetail) {
                $cartDetail->update(['Quantity' => $quantity]);
            }
        }

        // Redirect back to the cart page with a success message or any other desired action.
        return redirect()->back()->with('success', 'Cart updated successfully');
    }
}
