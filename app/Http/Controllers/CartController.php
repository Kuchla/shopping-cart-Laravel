<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
use App\Cart;
use App\Order;
use App\OrderProduct;
use Auth;

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
    // Recreates cart object and increment, if exists session cart
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cart->increment($id);

    Session::put('cart', $cart);
    return redirect()->route('cart.index');
  }

  public function getCheckout()
  {
    // If there is not cart session, returns 
    if (!Session::has('cart')) {
      return view('cart.checkout');
    }
    // Recreates cart with session data
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);

    // Creates the order with current user
    $order = new Order();
    $order->total = $cart->total;
    Auth::user()->orders()->save($order);

    // Creates order_product
    foreach ($cart->products as $product) {
      $order_product = new OrderProduct();

      $order_product->product_id = $product['product']['id'];
      $order_product->quantity = $product['quantity'];
      $order_product->total = $product['price'];
      $order_product->order_id = $order->id;

      $order_product->save();
    }

    Session::forget('cart');
    return redirect()->route('product.index')->with('success', 'Successfully purchased products!');
  }
}
