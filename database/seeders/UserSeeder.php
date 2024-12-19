<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Number;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        // php artisan db:seed --class=UserSeeder

        for ($i = 1; $i < 50; $i++) {
            DB::table('users')->insert([
                'nisn'            => $faker->ean8,
                'name'            => $faker->name,
                'password'        => Hash::make('password'),
                'email'           => Str::random(10).'@example.com',
                'nomor_handphone' => $faker->e164PhoneNumber,
                'alamat'          => Str::random(10),
                'profile'         => 'default.jpg',
                'dob'             => '2001-12-13',
            ]);
        }
    }
}
