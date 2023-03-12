<?php

namespace Database\Seeders;

use App\Models\AttributeValue;
use Illuminate\Database\Seeder;
//use DB;
use Illuminate\Support\Str;

class AttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        for($i =1; $i<=20; $i++){
//            DB::table('attribute_values')->insert([
//                'value' => Str::random(5),
//                'attribute_id' => rand(1,20),
//                'created_at' => date('Y-m-d H:i:s'),
//                'updated_at' =>date('Y-m-d H:i:s')
//            ]);
//        }

        AttributeValue::factory(20)->create();
    }
}
