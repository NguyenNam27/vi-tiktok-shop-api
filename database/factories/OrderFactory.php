<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'payment_method_id' => mt_rand(1,3),
            'discount' => Str::random(8),
            'coupon' =>Str::random(8),
            'status' =>$this->faker->randomElement(['unpaid', 'wait for confirmation']),
            'total_product' => mt_rand(1,10),
            'total_price' => mt_rand(1000,100000),
            'ship_method_id' => mt_rand(1,3),
            'staff_id' => mt_rand(1,10),
            'customer_id' => mt_rand(1,10),
        ];
    }
}
