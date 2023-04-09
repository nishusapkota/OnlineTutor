<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remarks extends Model
{
    use HasFactory;
    function student_assignment(){
        return $this->belongsTo('\App\Models\StudentAssignment');
    }
    protected $fillable=['student_assignment_id','remark'];
}
