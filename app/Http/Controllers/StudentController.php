<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Models\StudentAssignment;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function course_index(Course $course)
    {
        $semid=$course->semester_id;
        $cid=$course->id;
        $fid=$course->faculty_id;
       $users=User::all()->where('semester_id',$semid)->where('faculty_id',$fid);
       $assignments=Assignment::where('course_id',$cid)->Paginate(2);

    return view('student.dashboard',compact('course','users','assignments'));
    }
    
    public function upload_assignment(Request $request,Assignment $assignment)
    {
        $id=Auth::user()->id;
        $filename=time()."." .$request->file('file')->getClientOriginalExtension();
        $path=$request->file('file')->storeAs('assignments',$filename);
      
        StudentAssignment::create([
            'assignment_id'=>$assignment->id,
            'student_assignment'=>$path,
            'user_id'=>$id,
         ]);
         return redirect()->back();
        
        




    }
}
