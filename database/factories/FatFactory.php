<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Fat;
use Faker\Generator as Faker;

$factory->define(Fat::class, function (Faker $faker) {
    return [
        'name' => "Huile d'olive",
        'type' => function () {
          return App\FatType::find(1)->id;
        }
    ];
});
