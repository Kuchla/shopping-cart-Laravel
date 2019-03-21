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

        dd($request->session()->get('cart'));
    }
}
