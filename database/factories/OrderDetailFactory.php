<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => mt_rand(1,10),
            'product_id' => mt_rand(1,10),
            'price' => mt_rand(100,1000),
            'quantity' => mt_rand(1,10),
            'status' => mt_rand(0,1),
            'ship_status' => mt_rand(1,5),
        ];
    }
}
