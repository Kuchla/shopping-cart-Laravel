<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
use App\Cart;

class CartController extends Controller
{
    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        // $oldCart receives session cart if already exists
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        // create a new cart, passing the old data if exist a old cart
        $cart = new Cart($oldCart);
        $cart->add($product);
        // Update cart session
        $request->session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function getCart()
    {
        // get session cart and recreate cart object
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('cart.index', ['products' => $cart->products, 'total' => $cart->total]);
    }

    public function getDecrement($id)
    {
        // Recreated cart object and decrement, if exists session cart
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->decrement($id);
        //If deleteded all products, forget the session cart
        if (count($cart->products) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        Session::put('cart', $cart);
        return redirect()->route('cart.index');
    }

    public function getIncrement($id)
    {
        // Recreated cart object and increment, if exists session cart
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->increment($id);

        Session::put('cart', $cart);
        return redirect()->route('cart.index');
    }
}
