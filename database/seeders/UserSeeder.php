<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'user_name' => 'Admin',
            'email' => 'mimin@mail.com',
            'password' => bcrypt('adminku1'),
            'gender' => '-',
            'role' => 'admin',
            'validity' => 'verified'
        ]);

        DB::table('users')->insert([
            'user_name' => 'Pipuu',
            'email' => 'pipu@mail.com',
            'password' => bcrypt('pipu123'),
            'gender' => 'male'
        ]);
    }
}
