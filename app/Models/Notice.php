<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;
    function course(){
        return $this->belongsTo('\App\Models\Course');
    }
    protected $fillable=['courses_id','notice'];
}
