<?php

use Illuminate\Database\Seeder;
use App\Configuration;

class ConfigurationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Configuration::create([
        	'configuration_id' => 1,
        	'current_year' => 2018,
        	'current_semester' => 1,
        	'registration_open' => '2018-05-10',
        	'registration_close' => '2018-05-11'
        ]);
    }
}
