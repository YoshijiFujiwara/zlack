<?php

use Faker\Generator as Faker;
use App\Model\MessageContent;
use App\Model\Message;

$factory->define(MessageContent::class, function (Faker $faker) {
    return [
        'origin_id' => function () {
            return Message::all()->random();
        },
        'sentence' => $faker->sentence,
    ];
});
