<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
	protected $primaryKey = 'attendance_id';
    protected $fillable = ['week', 'status', 'type', 'student_id'];
    public $timestamps = false;
}
