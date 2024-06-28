<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Faker\Provider\pt_BR\Person;  // Adicione esta linha

$factory->define(User::class, function (Faker $faker) {
    $faker->addProvider(new Person($faker));  // Adicione esta linha

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('password'), // password
        'phone' => $faker->phoneNumber,
        'cpf' => $faker->cpf(false),  // Ajuste esta linha
        'remember_token' => Str::random(10),
    ];
});
