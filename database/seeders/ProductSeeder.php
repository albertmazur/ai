<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Factory::create();
        $date = [];

        for($i=0; $i < 30; $i++){
            $date[] =[
                "image_path" => $faker->randomElement(["products/icon.png", "products/icon2.png", "products/icon3.png","products/icon4.png" ]),
                "name" => $faker->words($faker->numberBetween(1,3), true),
                "description" => $faker->sentence(),
                "amount" => $faker->numberBetween(1, 50),
                "price" => $faker->numberBetween(1, 100),
                "category_id" => $faker->numberBetween(1, 7),
                "created_at" => now(),
                "updated_at" => now(),
            ];
        }

        Product::insert($date);
    }
}
