<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
	protected $primaryKey = 'assignment_id';
    public $timestamps = false;
    protected $fillable = ['student_id', 'topic_id', 'student_comment', 'teacher_comment', 'minute', 'partner', 'week'];

    public function vocabularies() {
    	return $this->hasMany('App\Vocabulary', 'assignment_id', 'assignment_id');
    }
}
