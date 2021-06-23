@extends('layouts.master')
@section('content')
    <div class="title m-b-md">
        Product List
    </div>

    <div class="row">
        @forelse($products as $key => $product)
            <div class="col-4">
                <div class="card text-left" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text text-dark">${{ $product->price }}</p>
                        <p class="card-text text-danger">Views : {{ $product->view_count }}</p>

                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-danger">No Product</p>
        @endforelse
    </div>
@endsection
