<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1); // Default to 1 if not specified

        $userId = Auth::id(); // Get the authenticated user's ID
        $sessionId = session()->getId(); // Get the current session ID

        // Check if a cart exists for the user or session
        $cart = Cart::where('user_id', $userId)->orWhere('session_id', $sessionId)->first();

        if (!$cart) {
            // Create a new cart if none exists
            $cart = new Cart();
            $cart->user_id = $userId;
            $cart->session_id = $sessionId;
            $cart->save();
        }

        // Check if the product is already in the cart
        $cartItem = CartItem::where('cart_id', $cart->id)->where('product_id', $productId)->first();

        if ($cartItem) {
            // If product exists in cart, update quantity
            $cartItem->quantity += $quantity;
        } else {
            // If product does not exist in cart, add new cart item
            $cartItem = new CartItem();
            $cartItem->cart_id = $cart->id;
            $cartItem->product_id = $productId;
            $cartItem->quantity = $quantity;
        }

        $cartItem->save();

        return response()->json(['message' => 'Product added to cart successfully']);
    }

    public function showCart()
    {
        $userId = Auth::id();
        $sessionId = session()->getId();

        $cart = Cart::with('cartItems.product')
                    ->where('user_id', $userId)
                    ->orWhere('session_id', $sessionId)
                    ->first();

        if (!$cart) {
            return response()->json(['message' => 'Cart is empty'], 404);
        }

        return response()->json($cart);
    }

    public function validateCart(Request $request)
    {
        // Implement the logic to validate the cart
        // This could include checking stock levels, applying discounts, calculating total price, etc.

        return response()->json(['message' => 'Cart validated successfully']);
    }
}