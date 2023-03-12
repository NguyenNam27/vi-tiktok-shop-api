<?php

namespace Database\Seeders;

use App\Models\Images;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PaymentMethod;
use App\Models\Product;
use Illuminate\Database\Seeder;
use PhpParser\Node\Attribute;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RoleAndPermissionSeeder::class,
            WarehouseSeeder::class,
            CategorySeeder::class,
            AttributeSeeder::class,
            AttributeValueSeeder::class,
            BrandSeeder::class,
            PaymentMethodSeeder::class,
            ShipMethodSeeder::class,
            OrderSeeder::class,
            ProductSeeder::class,
            OrderDetailSeeder::class,
            ImagesSeeder::class,
        ]);
    }
}
