<?php
    $totalPrice = 0.0;

    if(session('cart') > 0)
    {
        foreach (session('cart') as $item)
        {
            $totalPrice += $item['combinedPrice'];
        }
    }

?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="row">
                <div class="col-md-12">
                    <div class="offset-md-4 col-md-8">
                        <div class="row">
                            <div class="col-md-4">Quantity</div>
                            <div class="col-md-4">Price</div>
                            <div class="col-md-4">Combined </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="panel" class="panel">
            @if(session('cart') > 0)
                @foreach(session('cart') as $item)
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $item['name'] }}</h3>
                                    <div class="row">
                                        <div class="col-md-4 img text-center">
                                            <img src="{{ $item['imageUrl'] }}" class="img-fluid w-50" >
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-2">{{ $item['quantity'] }}</div>
                                                <div class="col-md-2">&euro; {{ $item['price'] }}</div>
                                                <div class="col-md-4 text-center">&euro; {{ $item['combinedPrice'] }}</div>
                                                <div class="col-md-2"><a href="{{ action('ShoppingCartController@addItem', $item['productId']) }}" class="btn btn-success"> + </a></div>
                                                <div class="col-md-2"><a href="{{ action('ShoppingCartController@removeItem', $item['productId']) }}" class="btn btn-danger"> - </a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="row">
                <div class="col-md-12 row">
                    <div class="offset-md-4 col-md-8">
                        <div class="row">
                            <div class="offset-md-7 col-md-1">Total:</div>
                            <div class="col-md-4 text-center">&euro; {{ $totalPrice }}</div>
                        </div>
                    </div>
                </div>
            </div>
            @guest
                <a class="btn btn-primary float-right mt-3 disabled">Login to order</a>
            @else
                <a href="{{ action('OrderController@order') }}" class="btn btn-primary float-right mt-3">ORDER</a>
            @endguest
        </div>
    </div>
@endsection