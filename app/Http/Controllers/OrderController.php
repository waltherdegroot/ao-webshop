<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;

class OrderController extends Controller
{
    public function index()
    {
        if(!Auth::check()) {
            return redirect('/');
        }

        $user = Auth::user();
        $orders = $user->orders()->get();

        return view('orders.index', ['orders' => $orders]);
    }

    public function order()
    {
        $cart = session()->get('cart');
        if (!$cart) {
            return redirect()->back()->with('message', "Can't checkout an empty cart!");
        }

        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['combinedPrice'];
        }
        $order = new Order();
        $order->name = Auth::id() . "-" . date('d') . date('m') . date('y') . "-" . date('Hi');
        $order->user_id = Auth::id();
        $order->total_price = $totalPrice;
        $order->save();

        foreach($cart as $item) {
            $order->products()->attach($item['productId']);
        }

        session()->forget('cart');

        return redirect('/');
    }
}
