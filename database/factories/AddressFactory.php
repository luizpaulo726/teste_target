<?php
namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'logradouro' => $faker->streetName,
        'numero' => $faker->buildingNumber,
        'bairro' => $faker->citySuffix,
        'complemento' => $faker->secondaryAddress,
        'cep' => $faker->postcode,
    ];
});
