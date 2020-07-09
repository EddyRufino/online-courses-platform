<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['PHP', 'JAVASCRIPT', 'DISEÑO WEB', 'SERVIDORES', 'MYSQL', 'NOSQL', 'AWS', 'VUE', 'ALPINE']),
        'description' => $faker->sentence
    ];
});
