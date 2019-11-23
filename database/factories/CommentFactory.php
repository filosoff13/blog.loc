<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {

    $user_id = $faker->randomElement([1,2,3,4,5,6,7,8,9]);

    return [
        'user_id' => $user_id,
        'comment' => $faker->text,
    ];
});
