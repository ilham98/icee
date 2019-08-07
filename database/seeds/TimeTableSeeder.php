<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('times')
        	->insert([
        		'start' => '08:00',
        		'type' => 'A',
        		'day' => '1'
        	]);
        DB::table('times')
        	->insert([
        		'start' => '09:00',
        		'type' => 'A',
        		'day' => '2'
        	]);
        DB::table('times')
        	->insert([
        		'start' => '10:00',
        		'type' => 'A',
        		'day' => '3'
        	]);
        DB::table('times')
        	->insert([
        		'start' => '11:00',
        		'type' => 'A',
        		'day' => '4'
        	]);
        DB::table('times')
        	->insert([
        		'start' => '12:00',
        		'type' => 'A',
        		'day' => '5'
        	]);
        DB::table('times')
        	->insert([
        		'start' => '13:00',
        		'type' => 'A',
        		'day' => '6'
        	]);
        DB::table('times')
        	->insert([
        		'start' => '08:00',
        		'type' => 'B',
        		'day' => '1'
        	]);
        DB::table('times')
        	->insert([
        		'start' => '09:00',
        		'type' => 'B',
        		'day' => '2'
        	]);
        DB::table('times')
        	->insert([
        		'start' => '10:00',
        		'type' => 'B',
        		'day' => '3'
        	]);
        DB::table('times')
        	->insert([
        		'start' => '11:00',
        		'type' => 'B',
        		'day' => '4'
        	]);
        DB::table('times')
        	->insert([
        		'start' => '12:00',
        		'type' => 'B',
        		'day' => '5'
        	]);
        DB::table('times')
        	->insert([
        		'start' => '13:00',
        		'type' => 'B',
        		'day' => '6'
        	]);

    }
}
