@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">ORDER</div>
        <div class="album py-5 bg-light">
          <div class="container">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Picture</th>
                  <th scope="col">Product</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Price</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($order->order_products as $product)
                <tr>
                  <td>
                    <img class="card-img-right flex-auto d-none d-md-block img-thumbnail"
                      style="width: 50px; height: 50px" src="{{ $product->product->image }}">
                  </td>
                  <td> {{ $product->product->name }}</td>
                  <td>
                    {{ $product->quantity }}
                  </td>
                  <td>U$$ {{ $product->total }}</td>
                </tr>
                @empty
                <p>Without products!</p>
                @endforelse
              </tbody>
            </table>
            <hr>
            <strong>Total:</strong> U$$ {{ $order->total }}
            <p>
              <a href="{{ route('product.index') }}" class="btn btn btn-secondary" role="button"
                aria-disabled="false">Continue Shopping</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection