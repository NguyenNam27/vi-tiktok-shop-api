<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ImagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'height' => mt_rand(1,1000),
            'product_id' => mt_rand(1,2),
            'width' => mt_rand(1,1000),
            'thumb_url_list' => Str::random(10),
            'url_list' => Str::random(10),
        ];
    }
}
