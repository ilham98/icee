<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('default555'),
            'role' => 1
        ]);
        DB::table('users')->insert([
        	'email' => 'teacher@gmail.com',
        	'password' => Hash::make('default555'),
            'role' => 2
        ]);
        DB::table('users')->insert([
        	'email' => 'student@gmail.com',
        	'password' => Hash::make('default555'),
            'role' => 3
        ]);
    }
}
