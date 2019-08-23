<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
 	protected $primaryKey = 'department_id';   

 	public function students() {
 		return $this->hasMany('App\Student', 'department_id', 'department_id');
 	}
}
