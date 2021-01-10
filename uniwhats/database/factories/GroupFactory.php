<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Group;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    return [
        'user_id' => substr($faker->sentence(2),0,-1),
        'url' => $faker->url,
        'isMain' => $faker->boolean(),
        'courseName' => $faker->string
    ];
});
