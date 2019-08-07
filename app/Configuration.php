<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
	protected $primaryKey = 'configuration_id';
	protected $fillable = ['current_year', 'current_semester', 'registration_open', 'registration_close'];
    public $timestamps = false;
}
