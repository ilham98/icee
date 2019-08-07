<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $primaryKey = 'student_id';	
	protected $fillable = ['student_id', 'student_number', 'name', 'phone_number', 'interview_date', 'reason', 'note', 'year', 'semester', 'user_id', 'department_id', 'level', 'class_teacher_id', 'corner_teacher_id', 'class_time_id', 'corner_time_id', 'teacher_id'];
	public $timestamps = false;

	public function times() {
		return $this->belongsToMany('App\Time', 'schedules', 'student_id', 'time_id');
	}

	public function teachers() {
		return $this->belongsToMany('App\Teacher', 'student_teacher', 'student_id', 'teacher_id')->withPivot(['type']);
	}

	public function department() {
		return $this->belongsTo('App\Department', 'department_id', 'department_id');
	}

	public function attendances() {
		return $this->hasMany('App\Attendance', 'student_id', 'student_id');
	}

	public function user() {
		return $this->belongsTo('App\User', 'user_id', 'user_id');
	}

	public function interviewer() {
		return $this->belongsTo('App\Teacher', 'teacher_id', 'teacher_id');
	}

	public function assignments() {
		return $this->hasMany('App\Assignment', 'student_id', 'student_id');
	}
}
