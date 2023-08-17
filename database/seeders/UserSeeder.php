<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $faker = \Faker\Factory::create();

        DB::table('users')->insert([
            'fullname' => $faker->name,
            'email' => $faker->unique()->email,
            'password' => Hash::make('password'),
            'phone' => '0822431739',
            'permission_id' => 6,
        ]);
    }
}
