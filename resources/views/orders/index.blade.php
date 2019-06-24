@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @forelse ($orders as $order)
                <div class="card productItem mt-2">
                    <div class="card-body">
                        <h3 class="card-title">{{$order->name}}</h3>
                        <p class="card-text">Ordered products:</p>
                        <ul>
                            @foreach($order->products()->get() as $product)
                                <li>{{$product->name}}</li>
                            @endforeach
                        </ul>
                        <h5 class="text-right">Total price: € {{$order->total_price}}</h5>
                    </div>
                </div>
            @empty
                <h3>No orders found.</h3>
            @endforelse
        </div>
    </div>
</div>
@endsection
