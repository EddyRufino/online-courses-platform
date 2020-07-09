<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use App\Teacher;
use App\Category;
use App\Level;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Course::class, function (Faker $faker) {
	$name = $faker->sentence;
	$status = $faker->randomElement([Course::PENDING, Course::PUBLISHED, Course::REJECTED]);
    return [
        'teacher_id' => Teacher::all()->random()->id,
        'category_id' => Category::all()->random()->id,
        'level_id' => Level::all()->random()->id,
        'name' => $name,
        'slug' => str::slug($name, '-'),
        'description' => $faker->paragraph,
        'picture' => \Faker\Provider\Image::image(storage_path() . '/app/public/courses', 600, 350, 'business', false),
        'status' => $status,
        'previous_approved' => $status !== Course::PUBLISHED ? false : true,
        'previous_rejected' => $status === Course::REJECTED ? true : false,
    ];
});
