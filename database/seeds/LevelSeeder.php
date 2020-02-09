<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
            [
                'name' => 'Admin Utama'
            ],
            [
                'name' => 'Admin Gudang'
            ],
            [
                'name' => 'Kasir'
            ]
        ]);
    }
}
