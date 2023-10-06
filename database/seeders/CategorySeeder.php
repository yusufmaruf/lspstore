<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => 'Handphoneku',
            'slug' => 'handphoneku',
            'image' => 'assets/category/tHGXlNjFmpwKWcbjV07Qe7feufbu8vwlfWxyCQ70.png'
        ], [
            'name' => 'Apart',
            'slug' => 'apart',
            'image' => 'assets/category/0C7Dtu3DATaf34ktmm2mXc8m7NN5ffKVYC5P6VTj.png'
        ]);
    }
}
