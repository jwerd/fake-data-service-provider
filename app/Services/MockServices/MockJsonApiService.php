<?php

namespace App\Services\MockServices;

use Faker;

class MockJsonApiService
{
    public function request(): array
    {
        $faker = Faker\Factory::create();

        return [[
            'userId'    => $faker->numberBetween(1000, 10000),
            'id'        => $faker->numberBetween(1000, 10000),
            'title'     => $faker->sentence(),
            'completed' => $faker->boolean(),
        ], [
            'userId'    => $faker->numberBetween(1000, 10000),
            'id'        => $faker->numberBetween(1000, 10000),
            'title'     => $faker->sentence(),
            'completed' => $faker->boolean(),
        ]];
    }
}
