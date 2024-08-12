<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FruitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fruits')->insert([
            [
                'id' => 1,
                'name' => 'Aguacate',
                'image' => 'e5e06ed189609a8aa763812bf06afa0e.jpg',
            ],
            [
                'id' => 2,
                'name' => 'Durazno',
                'image' => '13a87059e95643125c9e375df01715b9.jpg',
            ],
            [
                'id' => 3,
                'name' => 'Chirimoya',
                'image' => 'd6b610a352c4d3dc8c31634e7c7428c9.jpg',
            ],
        ]);
    }
}
