<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Report;
use Faker\Generator as Faker;

$factory->define(Report::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3, true),//title ce biti dve reci, true=ne sme da se ponavlja
        'content' => $faker->text(300),
    ];
});
