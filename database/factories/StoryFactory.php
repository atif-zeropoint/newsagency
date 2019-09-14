<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Story;
use App\User;
use Faker\Generator as Faker;

$factory->define(Story::class, function(Faker $faker) {
    return [
        'title'       => $faker->text(50),
        'description' => $faker->paragraph(30, true),
        'author_id'   => factory(User::class),
        'published'   => $faker->boolean,
    ];
});
