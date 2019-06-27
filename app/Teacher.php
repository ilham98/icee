<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $primaryKey = 'teacher_id';
    protected $fillable = ['name', 'phone_number', 'user_id'];
    public $timestamps = false;

    public function user() {
    	return $this->belongsTo('App\User', 'user_id', 'user_id');
    }
}
