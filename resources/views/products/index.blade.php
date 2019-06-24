@extends('layouts.app')

@section('content')

    <div class="container">
        <div id="panel" class="panel">
            @foreach ($products->chunk(3) as $items)
                <div class="row mt-2">
                    @foreach($items as $product)
                        <div class="col-md-4">
                            <div class="card">
                            <img class="card-img-top" src="{{ $product->imageUrl }}" alt="Card image cap">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $product->name }} ({{$product->price}})</h3>
                                    <a href="{{ $product->showProduct() }}" class="btn btn-primary float-right">See More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    <div class="container mt-1">
        {{ $products->links() }}
    </div>
@endsection