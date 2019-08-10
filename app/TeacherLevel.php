<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherLevel extends Model
{
	protected $primaryKey = 'teacher_level_id';
    protected $table = 'teacher_level';
    protected $fillable = ['level', 'year', 'semester', 'teacher_id'];
    public $timestamps = false;
}
