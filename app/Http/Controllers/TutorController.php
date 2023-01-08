<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function dashboardshow(Course $id)
    {
       // $course=Course::find($id);
        //$semid=$course->semester_id;
       // $users=User::all()->where('semester_id',$semid);
     //return view('tutor.dasbboard',compact('course','semid'));
      dd($id);
       //return $course;
    }
}
