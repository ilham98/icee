<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
	protected $fillable = ['assignment_id', 'word'];
	protected $primaryKey = 'vocabulary_id';
    public $timestamps = false;
}
