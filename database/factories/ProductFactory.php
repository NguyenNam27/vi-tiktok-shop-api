<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        $name = $this->faker->unique()->sentence(mt_rand(2,5));
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->paragraph(mt_rand(3,5)),
            'category_id' => mt_rand(1,20),
            'parent_id' => mt_rand(1,20),
            'brand_id' => mt_rand(1,10),
            'video' => Str::random(8),
            'attribute_id' => mt_rand(1,10),
            'attribute_values_id' => mt_rand(1,10),
            'warranty_period' => mt_rand(1,2),
            'warranty_policy' => mt_rand(1,2),
            'price' => mt_rand(100,1000),
            'price_purchase' => mt_rand(50,500),
            'skus' => Str::random(8),
        ];
    }
}
