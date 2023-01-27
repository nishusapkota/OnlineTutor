<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    function user(){
        return $this->belongsTo('\App\Models\User');
    }
    function semester(){
        return $this->belongsTo('\App\Models\Semester');
    }
    function faculty(){
        return $this->belongsTo('\App\Models\Faculty');
    }
    function assignments(){
        return $this->hasMany('\App\Models\Assignment');
    }
    protected $fillable=['course','user_id','faculty_id','semester_id'];
}
