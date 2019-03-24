<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Auth;

class OrderController extends Controller
{
  public function getOrders()
  {
    $orders = Order::where('user_id', Auth::id())->get();
    return view('order.index', compact('orders'));
  }
  public function getOneOrder($id)
  {
    $order = Order::find($id);
    return view('order.show', compact('order'));
  }
}
