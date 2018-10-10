<?php

use Faker\Generator as Faker;
use App\Model\Workspace;
use App\Model\Channel;

$factory->define(Channel::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'workspace_id' => function() {
            return Workspace::all()->random();
        }
    ];
});
