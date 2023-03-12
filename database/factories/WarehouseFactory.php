<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class WarehouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(mt_rand(2,4)),
            'code' => 'WH_'.Str::random(10),
            'phone' => $this->faker->phoneNumber,
            'city' => $this->faker->city,
            'address' => $this->faker->address,
            'email' => $this->faker->email,
        ];
    }
}
