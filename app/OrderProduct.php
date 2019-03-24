<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
  protected $fillable = [
    'order_id', 'product_id', 'total', 'quantity'
  ];

  public function order()
  {
    return $this->belongsTo('App\Order');
  }

  public function product()
	{
		return $this->belongsTo('App\Product');
	}

}
