<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentAssignment extends Model
{
    use HasFactory;
    function assignment(){
        return $this->belongsTo('\App\Models\Assignment');
    }
    function Remark(){
        return $this->belongsTo('\App\Models\Remark');
    }
    function user(){
        return $this->belongsTo('\App\Models\User');
    }
    protected $fillable=['assignment_id','student_assignment','user_id'];
}
