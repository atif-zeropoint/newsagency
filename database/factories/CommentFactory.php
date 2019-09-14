<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Story;
use App\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function(Faker $faker) {
    return [
        'detail' => $faker->paragraph,
        'writer_id' => factory(User::class),
        'story_id' => factory(Story::class),
    ];
});
