<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    function course(){
        return $this->belongsTo('\App\Models\Course');
    }
    protected $fillable=['course_id','chapter','title','video','note'];

    
}
