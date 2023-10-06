<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345'),
            'roles' => 'ADMIN',
            'gender' => '1',
            'address_one' => 'Address 1',
            'provinces_id' => '1',
            'regencies_id' => '1',
            'zip_code' => '12345',
            'country' => 'Indonesia',
            'phone_number' => '081234567890',
        ], [
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('12345'),
            'roles' => 'USER',
            'gender' => '1',
            'address_one' => 'Address 1',
            'provinces_id' => '1',
            'regencies_id' => '1',
            'zip_code' => '12345',
            'country' => 'Indonesia',
            'phone_number' => '081234567890',
        ]);
    }
}
