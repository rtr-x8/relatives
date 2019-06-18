<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Assertion;
use Faker\Generator as Faker;

$factory->define(Assertion::class, function (Faker $faker, $attributes) {
    $user_id = isset($attributes['user_id']) ?
        $attributes['user_id'] : factory(App\User::class)->create()->id;
    return [
        'body' => $faker->text,
        'provider' => "",
        'user_id' => $user_id,
    ];
});
