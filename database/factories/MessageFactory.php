<?php

use Faker\Generator as Faker;
use App\User;
use App\Model\Channel;
use App\Model\Message;
use App\Model\MessageType;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return User::all()->random();
        },
        'channel_id' => function() {
            return Channel::all()->random();
        },
        'type_id' => function() {
            return MessageType::all()->random();
        },
    ];
});
