<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Product::class, 50)->create();
        $categories = Category::all();

        //Attach products to a category
        Product::all()->each(function ($product) use ($categories) {
            $product->categories()->attach($categories->random(rand(1,5))->pluck('id')->toArray());
        });
    }
}
