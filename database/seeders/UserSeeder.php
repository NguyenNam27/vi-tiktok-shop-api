<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'first_name' => 'Hung',
                'last_name' => 'Trinh Quang',
                'user_type' => 'ADMIN',
                'email' => 'hungtq.vitech@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123qweasd'),
                'remember_token' => Str::random(10),
            ]
        );
        User::factory(100)->create();
    }
}
