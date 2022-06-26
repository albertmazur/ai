<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Jedzenie'],
            ['name' => 'Napoje'],
            ['name' => 'Akcesoria'],
            ['name' => 'Książki'],
            ['name' => 'Elektronika'],
            ['name' => 'Ogrodowe'],
            ['name' => 'Ubrania']
        ];
        ProductCategory::insert($data);
    }
}
