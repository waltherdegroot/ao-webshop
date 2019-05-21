<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function showProducts(){
        return action('ProductController@getItemsByCategory', $this->id);
    }
}
