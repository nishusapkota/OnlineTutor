<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function upload_assignment(Course $course,Request $request)
    {
      
     $course_id=$course->id;
    $request->validate([
      'assignment'=>['required'],
      
     ]);
    // dd($data);
     //Assignment::create($data);
    // return redirect('/');
   Assignment::create([
      'assignment'=>$request->assignment,
      'course_id'=>$course_id,
      
   ]);
   return redirect()->back();
    }
    

    public function create_note(Course $course)
    {
      return view('tutor.note_create',compact('course'));
    }
}
