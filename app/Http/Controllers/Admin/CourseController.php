<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Course;
use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Semester;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Course::all();
        return view('admin.course.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all()->where('role','teacher');
        $semesters=Semester::all();
        $faculties=Faculty::all();
        return view('admin.course.create',compact('faculties','users','semesters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
        'course'=>['required'],
        'user_id'=>['required'],
        'faculty_id'=>['required'],
        'semester_id'=>['required'],
        ]);
        \App\Models\Course::create($data);
        return redirect()->route('admin.course.index')->with('success','Course created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('admin.course.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $users=User::all()->where('role','teacher');
        $semesters=Semester::all();
        $faculties=Faculty::all();
        return view('admin.course.edit',compact('course','users','semesters','faculties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $data=$request->validate([
            'course'=>['required'],
            'user_id'=>['required'],
            'faculty_id'=>['required'],
            'semester_id'=>['required'],
            ]);
            $course->update($data);
            return redirect()->route('admin.course.index')->with('success','Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.course.index')->with('success','Course Deleted Successfully');
    }
}
