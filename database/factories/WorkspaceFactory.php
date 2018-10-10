<?php

use Faker\Generator as Faker;
use App\Model\Workspace;

$factory->define(Workspace::class, function (Faker $faker) {
    return [
        'name' => $faker->address,
        'url' => $faker->url,
    ];
});
