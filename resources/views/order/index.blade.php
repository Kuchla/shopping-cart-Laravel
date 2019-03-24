@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">ORDERS</div>
        <div class="album py-5 bg-light">
          <div class="container">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Total</th>
                  <th scope="col">Data</th>
                  <th scope="col">Visualizar</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($orders as $order)
                <tr>
                  <td>{{ $order->id }}</td>
                  <td> {{ $order->total }}</td>
                  <td> {{ $order->created_at }}</td>
                  <td>
                    <a href="{{ route('order.show', ['id' => $order->id]) }}">
                      <i class="fas fa-eye"></i>
                    </a>
                  </td>
                </tr>
                @empty
                <p>Without products!</p>
                @endforelse
              </tbody>
            </table>
            <hr>
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