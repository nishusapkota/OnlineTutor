<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;
    function courses(){
        return $this->hasMany('\App\Models\Course');
    }
    function users(){
        return $this->hasMany('\App\Models\User');
    }
}
