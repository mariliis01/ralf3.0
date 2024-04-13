<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function handleCheckout(Request $request)
    {
        session()->forget('cart');

        return redirect()->route('products.index')->with('success', 'Thank you for your purchase!');
    }
    public function checkout()
    {
        // Ensure there's a cart to check out with
        if (!session()->has('cart') || empty(session()->get('cart'))) {
            return redirect()->route('products.index')->with('error', 'Your cart is empty.');
        }
        return view('checkout');
    }
}
