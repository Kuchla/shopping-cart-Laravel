@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
		  @if(Session::has('success'))
      	<div class="alert alert-info alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          {{ Session::get('success') }}
        </div>
      @endif
			<div class="card">
				<div class="card-header">PRODUCTS</div>
				<div class="album py-5 bg-light">
					<div class="container">
						<div class="row">
							@forelse ($products as $product)
							<div class="col-sm-6">
								<div class="card flex-md-row mb-4">
									<div class="card-body d-flex flex-column align-items-start">
										<strong class="d-inline-block mb-2 text-primary">Product id: {{ $product->id }}</strong>
										<h5 class="mb-0">
											<a class="text-dark" href="#">{{ $product->name }}</a>
										</h5>
										<img class="card-img-right flex-auto d-none d-md-block img-thumbnail"
											style="width: 200px; height: 200px" src="{{ $product->image }}" alt="Card image cap">
										<p class="card-text mb-auto">{{ $product->description }}</p>
										<hr>
										<p>
											<strong>U$$ {{ $product->price }}</strong>
										</p>
										<p>
											<a href={{ route('cart.add', ['id' => $product->id]) }} class="btn btn-primary" role="button" aria-disabled="false">Add to cart</a>
										</p>
									</div>
								</div>
								<br>
							</div>
							@empty
							<p>Without products!</p>
							@endforelse
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection