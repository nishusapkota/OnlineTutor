<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAssignment extends Model
{
    use HasFactory;
    function assignment(){
        return $this->belongsTo('\App\Models\Assignment');
    }
    protected $fillable=['assignment_id','student_assignment','user_id'];
}
