<?php

namespace App;

use App\Product;

class ShoppingCart
{
    public static function addItem(Product $product)
    {
        $cart = session()->get('cart');
        $id = $product->id;
 
        // if cart is empty then this the first product
        if(!$cart) 
        {
            $cart = [
                $id => [
                    "productId" => $id,
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "imageUrl" => $product->imageUrl,
                    "combinedPrice" => $product->price
                ]
            ];
 
            session()->put('cart', $cart);
 
            return redirect('/products')->with('success', 'Product added to cart successfully!');
        }
 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) 
        {
            $cart[$id]['quantity']++;
            $cart[$id]['combinedPrice'] += $product->price;
 
            session()->put('cart', $cart);
 
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
 
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "productId" => $id,
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "imageUrl" => $product->imageUrl,
            "combinedPrice" => $product->price
        ];
 
        session()->put('cart', $cart);
        return redirect('/products')->with('success', 'Product added to cart successfully!');
    }

    public static function removeItem($id)
    {
        $cart = session()->get('cart');

        if(!$cart)
        {
            return redirect()->action('ShoppingCartController@cart');
        }

        if(isset($cart[$id]))
        {
            if($cart[$id]['quantity'] > 1)
            {
                $cart[$id]['quantity']--;
                $cart[$id]['combinedPrice'] -= $cart[$id]['price'];
                session()->put('cart', $cart);
            }
            else
            {
                session()->forget('cart.' .$cart[$id]['productId']);
            }

            return redirect()->action('ShoppingCartController@cart');
        }
    }

    public static function clearCart()
    {
        session()->forget('cart');
    }
}
