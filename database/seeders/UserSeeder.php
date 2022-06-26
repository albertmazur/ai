<?php

namespace Database\Seeders;

use App\Models\User;
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
        //
        $data = [
            'name' => 'admin',
            'surname' => 'admin',
            'phone_number' => '123456789',
            'email' => 'admin@shop.pl',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make("admin123"),
            "created_at" => now(),
            "updated_at" => now()

        ];
        User::insert($data);
    }
}
