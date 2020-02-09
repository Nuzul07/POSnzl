<?php

use Illuminate\Database\Seeder;

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
            [
                'name' => 'Admin Utama',
                'username' => 'adminU',
                'email' => 'adminU@gmail.com',
                'password' => bcrypt('adminU'),
                'level_id' => 1,
                'toko_id' => 1
            ],
            [
                'name' => 'Admin Gudang',
                'username' => 'adminG',
                'email' => 'adminG@gmail.com',
                'password' => bcrypt('adminG'),
                'level_id' => 2,
                'toko_id' => 1
            ],
            [
                'name' => 'Kasir',
                'username' => 'kasir',
                'email' => 'kasir@gmail.com',
                'password' => bcrypt('kasir'),
                'level_id' => 3,
                'toko_id' => 1
            ]
        ]);
    }
}
