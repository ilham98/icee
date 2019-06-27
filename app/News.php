<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $primaryKey = 'news_id';
    protected $fillable = ['title', 'body'];
}
