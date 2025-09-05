<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marques')->insert([
            'name' => 'YAMAHA',
        ]);

        DB::table('marques')->insert([
            'name' => 'HARLEY DAVIDSON',
        ]);

        DB::table('marques')->insert([
            'name' => 'BMW',
        ]);

        DB::table('marques')->insert([
            'name' => 'NISSAN',
        ]);

        DB::table('marques')->insert([
            'name' => 'MERCEDES',
        ]);

        DB::table('marques')->insert([
            'name' => 'DACIA',
        ]);

        DB::table('marques')->insert([
            'name' => 'HYUNDAY',
        ]);

        DB::table('marques')->insert([
            'name' => 'HONDA',
        ]);

        DB::table('marques')->insert([
            'name' => 'FORD',
        ]);

        DB::table('marques')->insert([
            'name' => 'CHEVROLET',
        ]);

        DB::table('marques')->insert([
            'name' => 'LAND ROVER',
        ]);

        DB::table('marques')->insert([
            'name' => 'VOLKSWAGEN',
        ]);

        DB::table('marques')->insert([
            'name' => 'PORSHE',
        ]);

        DB::table('marques')->insert([
            'name' => 'AUDI',
        ]);

        DB::table('marques')->insert([
            'name' => 'BENTLEY',
        ]);

        DB::table('marques')->insert([
            'name' => 'AUDI',
        ]);

        DB::table('marques')->insert([
            'name' => 'JEEP',
        ]);

        DB::table('marques')->insert([
            'name' => 'LEXUS',
        ]);
    }
}
