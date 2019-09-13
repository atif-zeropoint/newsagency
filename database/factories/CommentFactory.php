<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Story;
use Faker\Generator as Faker;

$factory->define(Comment::class, function(Faker $faker) {
    return [
        'detail' => $faker->paragraph,
        'author' => $faker->name,
        'story_id' => factory(Story::class),
    ];
});
