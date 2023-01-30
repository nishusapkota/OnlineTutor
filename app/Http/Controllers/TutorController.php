<?php

namespace App\Http\Controllers;

use App\Models\Note;
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
    public function store_note(Course $course,Request $request)
    {
      $note=$request->validate([
        'chapter'=>['required','integer'],
        'title'=>['required'],
        'video'=>['nullable','mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts','max:100040'],
        'note'=>['required','file','mimes:ppt,pptx,docx,doc,pdf,xls,xlsx','max:204800'],
      ]);

      if($request->hasFile('video'))
      {
        $videos=time().".".$request->file('video')->getClientOriginalExtension();
      $path2=$request->file('video')->storeAs('video_file',$videos);
      $note['video']=$path2;
      }
      else{
        $note['video']="null";
      }

      $file=time().".".$request->file('note')->getClientOriginalExtension();
      $path1=$request->file('note')->storeAs('Notes',$file);

   /* Note::create([
        'course_id'=>
        'chapter'=>$request->chapter,
        'title'=>$request->title,
        'note'=>$path1,
      ]);*/
    $note['course_id']=$course->id;
    $note['chapter']=$request->chapter;
    $note['title']=$request->title;
    $note['note']=$path1;
    Note::create($note);

    
      
      return redirect()->route('tutor.note_create',$course)->with('success',"Notes uploaded successfully");

    }
}
