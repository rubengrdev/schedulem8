<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;
use App\User;

$factory->define(Task::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->word(5),
        'desc' => $faker->text(150),
        'category' => $faker->word(5),
        'user_id' => rand(1, count(User::all())),
        'datetask' => '2022-05-01 09:00:00',
        'created_at' => now(),
        'updated_at' => now()
    ];
});
