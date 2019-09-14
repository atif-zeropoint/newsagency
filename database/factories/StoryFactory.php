<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Story;
use Faker\Generator as Faker;

$factory->define(Story::class, function(Faker $faker) {
    return [
        'title'       => $faker->text(50),
        'description' => $faker->paragraph(30, true),
        'author'      => $faker->name,
        'published'   => $faker->boolean,
    ];
});
