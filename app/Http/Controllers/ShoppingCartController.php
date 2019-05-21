<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;
use App\Product;

class ShoppingCartController extends Controller
{
    public function cart()
    {
        return View('shoppingCart.index');
    }

    public function addItem($productId)
    {
        $product = Product::find($productId);

        return ShoppingCart::addItem($product);
    }

    public function removeItem($productId)
    {
        return ShoppingCart::removeItem($productId);
    }
}
