<?php

namespace App\Http\Controllers;
use App\Models\Semester;

use App\Models\Course;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        if (auth()->user()->role == 'admin') {
            return redirect('/administrator');
        } else if (auth()->user()->role == 'teacher') {
            return redirect('/tutor');
        } 
            return redirect('/student');
        
    }

    public function tutorhomepage(){
        $id=Auth::user()->id;
        //dd($id);
        $courses=Course::all()->where('user_id',$id);
        return view("tutor.homepage",compact('courses'));
    }
    
    public function studenthomepage(){
        //$id=Auth::user()->id;
        $fid=Auth::user()->faculty_id;
       // $faculty=Faculty::where('id',$fid)->first();
        $sid=Auth::user()->semester_id;
       // $semester=Semester::where('id',$sid)->first();
$courses=Course::all()->where('faculty_id',$fid)->where('semester_id',$sid);
       
       return view("student.homepage",compact('courses'));
        //dd($courses);
    }

}
