<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    public function run()
    {
        DB::table('clients')->insert([
            'name' => 'Abole',
            'lastname' => 'Daniel',
            'address' => 'Abidjan',
            'phone' => '01020304',
            'email' => 'client@test.com',
            'password' => Hash::make('12345'),
        ]);
    }
}
