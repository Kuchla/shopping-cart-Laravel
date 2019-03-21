@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">CART</div>
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
                  @forelse ($products as $product)
                    <tr>
                      <td>
                        <img class="card-img-right flex-auto d-none d-md-block img-thumbnail"
                          style="width: 50px; height: 50px" src="{{ $product['product']['image'] }}">
                      </td>
                      <td> 
                        {{ $product['product']['name'] }}
                      </td>
                      <td>
                          <a href="{{ route('cart.decrement', ['id' => $product['product']['id']]) }}"> - </a> 
                            {{ $product['quantity'] }}
                          <a href="{{ route('cart.increment', ['id' => $product['product']['id']]) }}"> + </a>
                      </td>
                      <td>
                        U$$ {{ $product['price'] }}
                      </td>
                    </tr>
                  @empty
                    <p>Without products!</p>
                  @endforelse
                </tbody>
              </table>
              <hr>
              <strong>Total:</strong> U$$ {{ $total }}
              <p>
                <a href="{{ route('cart.checkout') }}" class="btn btn-primary" role="button"
                  aria-disabled="false">Checkout</a>
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