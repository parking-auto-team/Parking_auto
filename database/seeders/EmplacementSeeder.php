<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmplacementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emplacements')->insert([
            'number' => 'P-001',
            'status' => false,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('emplacements')->insert([
            'number' => 'P-002',
            'status' => false,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('emplacements')->insert([
            'number' => 'P-003',
            'status' => false,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('emplacements')->insert([
            'number' => 'P-004',
            'status' => false,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('emplacements')->insert([
            'number' => 'P-005',
            'status' => false,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('emplacements')->insert([
            'number' => 'P-006',
            'status' => false,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('emplacements')->insert([
            'number' => 'P-007',
            'status' => false,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s')

        ]);

        DB::table('emplacements')->insert([
            'number' => 'P-008',
            'status' => false,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('emplacements')->insert([
            'number' => 'P-009',
            'status' => false,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('emplacements')->insert([
            'number' => 'P-0010',
            'status' => false,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('emplacements')->insert([
            'number' => 'P-0011',
            'status' => false,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('emplacements')->insert([
            'number' => 'P-0012',
            'status' => false,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('emplacements')->insert([
            'number' => 'P-0013',
            'status' => false,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('emplacements')->insert([
            'number' => 'P-0014',
            'status' => false,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('emplacements')->insert([
            'number' => 'P-0015',
            'status' => false,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('emplacements')->insert([
            'number' => 'P-0016',
            'status' => false,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('emplacements')->insert([
            'number' => 'P-0017',
            'status' => false,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('emplacements')->insert([
            'number' => 'P-0018',
            'status' => false,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('emplacements')->insert([
            'number' => 'P-0019',
            'status' => false,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('emplacements')->insert([
            'number' => 'P-0020',
            'status' => false,
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        ]);


    }
}
