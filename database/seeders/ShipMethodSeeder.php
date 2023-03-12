<?php

namespace Database\Seeders;

use App\Models\ShipMethod;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ShipMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShipMethod::create(
            [
                'name' => 'AHAMOVE',
            ]
        );
        ShipMethod::create(
            [
                'name' => 'GHTK',
            ]
        );
        ShipMethod::create(
            [
                'name' => 'GHN',
            ]
        );
        ShipMethod::create(
            [
                'name' => 'VIETTEL_POST',
            ]
        );
        ShipMethod::create(
            [
                'name' => 'VIETNAM_POST',
            ]
        );
    }
}
