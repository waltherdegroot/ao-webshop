@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="panel" class="panel bg-white p-5 mt-2">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ $product->imageUrl }}" alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title">{{ $product->name }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="text-right">
                        <a href="{{ action('ShoppingCartController@addItem', $product->id) }}" class="btn btn-primary text-right">Add to cart ( &euro; {{ $product->price }} )</a>
                    </div>
                    <div class="container mt-3">
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection