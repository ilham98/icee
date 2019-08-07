<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $primaryKey = 'time_id';
    public $timestamps = false;

    public function students() {
    	return $this->belongsToMany('App\Student', 'schedules', 'time_id', 'student_id');
    }
}
