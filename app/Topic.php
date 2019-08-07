<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $primaryKey = 'topic_id';
    protected $fillable = ['conversation', 'year', 'semester', 'teacher_id', 'week', 'time_id'];
    public $timestamps = false;
}
