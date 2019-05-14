@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <a href="{{ action('ProductController@create') }}" class="btn btn-primary">Add</a>
    </div>
    <div class="container">
        <div id="panel" class="panel">
            @foreach ($products->chunk(3) as $items)
                <div class="row">
                    @foreach($items as $product)
                        <div class="col-md-4">
                            <div class="card">
                            <img class="card-img-top" src="{{ $product->imageUrl }}" alt="Card image cap">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $product->name }} ({{$product->price}})</h3>
                                <a href="{{ action('ProductController@show', $product) }}" class="btn btn-primary float-right">See More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        {{ $products->links() }}
    </div>
@endsection