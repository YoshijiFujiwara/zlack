<?php

use Faker\Generator as Faker;
use App\Model\Reaction;

$factory->define(Reaction::class, function (Faker $faker) {

    $user = User::all()->random()->first();
    $user->channels();

    return [
        'user_id' => function() {
            return User::all()->random();
        },
        'message_id' => function() {

        }
    ];
});
