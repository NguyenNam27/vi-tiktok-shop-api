<?php

namespace Database\Factories;

use App\Enums\UserTypesEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Spatie\Enum\Laravel\Faker\FakerEnumProvider;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new FakerEnumProvider($this->faker));

        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'phone' => $this->faker->phoneNumber,
            'user_type' => $this->faker->randomEnum(UserTypesEnum::class),
            'gender' => $this->faker->randomElement(['male', 'female', '']),
            'date_of_birth' => $this->faker->date(),
            'status' => mt_rand(0,1),
            'is_user_banned' => mt_rand(0,1),
            'newsletter_enable' => mt_rand(0,1),
            'images' => json_encode($this->faker->randomElements([$this->faker->imageUrl,$this->faker->imageUrl,$this->faker->imageUrl])),
            'socials' => json_encode($this->faker->randomElements([$this->faker->url,$this->faker->url,$this->faker->url])),
        ];
    }
}
