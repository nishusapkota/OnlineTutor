<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function dashboardshow(Course $course)
    {
      //$course=Course::find($id);
        $semid=$course->semester_id;
        $fid=$course->faculty_id;
       $users=User::all()->where('semester_id',$semid)->where('faculty_id',$fid);
      return view('tutor.dasbboard',compact('course','fid','semid','users'));
      //dd($semid);
       //return $course;
    }
}
