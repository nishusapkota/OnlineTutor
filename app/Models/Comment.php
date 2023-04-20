<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    function user(){
        return $this->belongsTo('\App\Models\User');
    }
    function post(){
        return $this->belongsTo('\App\Models\Post');
    }
    function replies(){
        return $this->hasMany('\App\Models\Comment','parent_id');
    }
    use HasFactory;
    protected $fillable=['user_id','post_id','parent_id','comment'];
}
