<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    function course(){
        return $this->belongsTo('\App\Models\Course');
    }
    function comments(){
        return $this->hasMany('\App\Models\Comment')->whereNull('parent_id');
    }
    protected $fillable=['title','image','slug','course_id','body'];
}
