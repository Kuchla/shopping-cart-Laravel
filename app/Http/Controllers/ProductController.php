<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }
}
