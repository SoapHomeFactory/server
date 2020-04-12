<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Perfume;
use Faker\Generator as Faker;

$factory->define(Perfume::class, function (Faker $faker) {
    return [
        'name' => 'Eau florale de menthe',
        'fragrance' => 'menthe',
        'type' => function () {
            return App\PerfumeType::find(3)->id;
        }
    ];
});
