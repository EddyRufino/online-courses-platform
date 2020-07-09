<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Goal;
use App\Course;
use Faker\Generator as Faker;

$factory->define(Goal::class, function (Faker $faker) {
    return [
        'course_id' => Course::all()->random()->id,
        'goal' => $faker->sentence
    ];
});
