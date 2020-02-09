<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('informasi_tokos')->insert(
            [
                'name' => 'NzlPOS',
                'alamat' => 'JL.F Gang C',
                'telepon' => '085960383293',
                'kode_pos' => 12830
            ]
        );
    }
}
