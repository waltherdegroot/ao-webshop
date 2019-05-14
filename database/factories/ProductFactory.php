<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'description' => $faker->text(rand(50,250)),
        'price' => $faker->randomFloat(2, 0.01,500),
        'imageUrl' => $faker->imageUrl(640,480),
    ];
});
