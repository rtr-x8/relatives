<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Assertion;
use Faker\Generator as Faker;

$factory->define(Assertion::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->text,
        'provider' => "",
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        },
    ];
});
