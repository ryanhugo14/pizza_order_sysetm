<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartPage()
    {
        $cart = Cart::select('carts.*', 'products.name as pizza_name', 'products.price as pizza_price')
            ->leftJoin('products', 'products.id', 'carts.product_id')
            ->where('user_id', Auth::user()->id)
            ->get();

        $totalPrice = 0;
        foreach ($cart as $c) {
          $totalPrice += $c->pizza_price * $c->qty;
        }
        return view('user.cart.cart', compact('cart', 'totalPrice'));
    }
}
