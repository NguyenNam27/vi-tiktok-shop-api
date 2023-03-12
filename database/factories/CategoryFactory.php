<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $count = Category::count();
        $name = $this->faker->name;
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'parent_id' => mt_rand(0,$count),
            'status' => mt_rand(0,1),
        ];
    }
}
