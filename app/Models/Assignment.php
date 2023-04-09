<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assignment extends Model
{
    use HasFactory;
    function course(){
        return $this->belongsTo('Course');
    }
    function studentassignments()
    {
        return $this->hasMany('\App\Models\StudentAssignment');
    }
    protected $fillable=['assignment','due_date','course_id'];
}
