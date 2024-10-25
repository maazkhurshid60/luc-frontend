<?php

namespace Database\Seeders;

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
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'user_id' => 1,
            'name' => 'Admin',
            'email' => 'admin@afcon.com',
            'status' => 'active',
            'username' => 'admin',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'password' => \Illuminate\Support\Facades\Hash::make('123123'),
        ]);
    }
}
