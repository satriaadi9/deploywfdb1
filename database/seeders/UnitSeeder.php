<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('units')->insert([
            [
                'unit_name'=>'Mechanical Engineering',
                'unit_level'=>2,
                'created_at'=>now(),
            ],
            [
                'unit_name'=>'Industrial Engineering',
                'unit_level'=>2,
                'created_at'=>now(),
            ],
        ]);
    }
}
