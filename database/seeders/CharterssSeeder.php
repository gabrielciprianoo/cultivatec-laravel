<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CharterssSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('charters')->insert([
            ['id' => 1, 'type' => 'Obligatorio'],
            ['id' => 2, 'type' => 'No Obligatorio']
        ]);
    }
}
