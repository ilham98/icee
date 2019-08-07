<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')
        	->insert([
        		'teacher_id' => 1,
        		'name' => 'Sarah Sechan',
        		'phone_number' => '090940494',
        		'user_id' => 2
        	]);
    }
}
