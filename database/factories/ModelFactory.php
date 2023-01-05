<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'activated' => true,
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'email' => $faker->email,
        'first_name' => $faker->firstName,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'last_login_at' => $faker->dateTime,
        'last_name' => $faker->lastName,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'updated_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Requisition::class, static function (Faker\Generator $faker) {
    return [
        'approved_by' => $faker->sentence,
        'article' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'delivery_terms' => $faker->sentence,
        'order' => $faker->sentence,
        'order_date' => $faker->date(),
        'payment_date' => $faker->date(),
        'produced_by' => $faker->sentence,
        'provider' => $faker->sentence,
        'quantity' => $faker->randomNumber(5),
        'received_by' => $faker->sentence,
        'total' => $faker->randomNumber(5),
        'unit_price' => $faker->randomNumber(5),
        'updated_at' => $faker->dateTime,
        'user_id' => $faker->randomNumber(5),
        
        
    ];
});
