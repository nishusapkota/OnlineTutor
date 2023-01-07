<?php

namespace App\Http\Controllers;

use App\Models\Course;
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
        return view("student.homepage");
    }

}
