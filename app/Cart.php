<?php

namespace App;

class Cart
{
    public $products = null;
    public $total = 0;
    public $quantity = 0;

    public function __construct($oldCart)
    {
        // if exists old cart, the new receives your data
        if ($oldCart) {
            $this->products = $oldCart->products;
            $this->total = $oldCart->total;
            $this->quantity = $oldCart->quantity;
        }
    }
    public function add($new_product)
    {
        // created array to add new product
        $storedProduct = ['quantity' => 0, 'price' => $new_product->price, 'product' => $new_product];
        // if already exists one array of products
        if ($this->products) {
            // if exists one product with new_product->id
            if (array_key_exists($new_product->id, $this->products)) {
                // associative array, $storedProduct recovers products[id] that already exists
                $storedProduct = $this->products[$new_product->id];
            }
        }
        // Increment the product attributes
        $storedProduct['quantity']++;
        $storedProduct['price'] = $new_product->price * $storedProduct['quantity'];

        // array products[id], receives data of the updated or created product
        $this->products[$new_product->id] = $storedProduct;
        // Increment total and quantity of all products
        $this->quantity++;
        $this->total += $new_product->price;
    }

    public function decrement($id)
    {
        // Decrement product with $id
        $this->products[$id]['quantity']--;
        $this->products[$id]['price'] -= $this->products[$id]['product']['price'];
        $this->quantity--;
        $this->total -= $this->products[$id]['product']['price'];
        // If quantity of product with $id is 0, destroy array products with $id
        if ($this->products[$id]['quantity'] <= 0) {
            unset($this->products[$id]);
        }
    }

    public function increment($id)
    {   
        // Increment products
        $this->products[$id]['quantity']++;
        $this->products[$id]['price'] += $this->products[$id]['product']['price'];
        $this->quantity++;
        $this->total += $this->products[$id]['product']['price'];
    }
}
