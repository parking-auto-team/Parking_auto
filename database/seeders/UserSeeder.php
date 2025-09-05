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
        DB::table('users')->insert([
            'email' => 'gerant@parking.com',
            'password' => Hash::make('12345'),
            'role_id' => 1,

        ]);

        DB::table('users')->insert([
            'email' => 'client@parking.com',
            'password' => Hash::make('12345'),
            'role_id' => 2,

        ]);

        DB::table('users')->insert([
            'email' => 'admin@parking.com',
            'password' => Hash::make('12345'),
            'role_id' => 3,

        ]);
    }
}
