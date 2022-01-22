<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id' => 15,
        'career_level' => 4,
        "order_service" => 7,
        "deadline_id" => 1,
        "status_id" => 1,
        "detail" => $this->faker->text,
        "invoice_id" => 28,
    ];
});
