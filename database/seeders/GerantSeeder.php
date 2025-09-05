<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GerantSeeder extends Seeder
{
    public function run()
    {
        DB::table('gerants')->insert([
            'name' => 'NDoman',
            'lastname' => 'Ange',
            'address' => 'Yopougon',
            'phone' => '05060708',
            'email' => 'gerant@test.com',
            'password' => Hash::make('12345'),
        ]);
    }
}
