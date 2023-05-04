<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Post;
use App\Models\User;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Remarks;
use App\Models\Semester;
use App\Models\Assignment;

use Illuminate\Http\Request;
use App\Models\StudentAssignment;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Notification;
use App\Notifications\NewAssignmentNotification;
use App\Notifications\NoteUploaded;

class TutorController extends Controller
{
  public function dashboardshow(Course $course)
  {
    //$course=Course::find($id);
    $semid = $course->semester_id;
    $fid = $course->faculty_id;
    $users = User::all()->where('semester_id', $semid)->where('faculty_id', $fid);
    return view('tutor.dasbboard', compact('course', 'fid', 'semid', 'users'));
    //dd($semid);
    //return $course;
  }
  public function upload_assignment(Course $course, Request $request)
  {

    $course_id = $course->id;
    $request->validate([
      'assignment' => ['required'],
      'due_date' => ['required'],
    ]);
    // dd($data);
    //Assignment::create($data);
    // return redirect('/');
   $assignment= Assignment::create([
      'assignment' => $request->assignment,
      'due_date' => $request->due_date,
      'course_id' => $course_id,
    ]);
// Get the students enrolled in the course
$students = User::where('semester_id', $course->semester_id)
->where('faculty_id', $course->faculty_id)
->get();
 Notification::send($students,new NewAssignmentNotification($assignment));
 return redirect()->back();
  }

  public function index(Course $course)
  {
    $assignments = Assignment::where('course_id', $course->id)->simplePaginate(3);
    return view('tutor.assignment_index', compact('course', 'assignments'));
  }
  public function uploaded_assignment(Assignment $assignment)
  {
    
    $course_id=$assignment->course_id;
    $course=Course::where('id',$course_id)->first();
    $name=$course->course;

    $semid = $course->semester_id;
    $semester=Semester::where('id',$semid)->first();
    $sem=$semester->sem;

    $fid = $course->faculty_id;
    $faculty=Faculty::where('id',$fid)->first();
    $faculty=$faculty->name;

    $student_assignments = StudentAssignment::all()->where('assignment_id', $assignment->id);
    //dd($student_assignments);
   // die();
    return view('tutor.student_assignment', compact('assignment','student_assignments','course','name','sem','faculty'));
  }

  //public function show_assignment(Assignment $assignment)
 // {
    
 //  return view('tutor.show_assignment', compact('assignment'));
  //}
public function remark(Request $request,StudentAssignment $assignment)          
{
  Remarks::create([
'student_assignment_id'=>$assignment->id,
'remark'=>$request->remarks,
  ]);
  return redirect()->route('tutor.uploaded_assignment',[$assignment->assignment_id]);
}



  public function create_note(Course $course)
  {
    return view('tutor.note_create', compact('course'));
  }
  public function store_note(Course $course, Request $request)
  {
    $newNote = [];
    $note = $request->validate([
      'chapter' => ['required', 'integer'],
      'title' => ['required'],
      'video' => ['nullable', 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts', 'max:100040'],
      'note' => ['required', 'file', 'mimes:ppt,pptx,docx,doc,pdf,xls,xlsx,txt', 'max:204800'],
    ]);
    if ($request->hasFile('video')) {
      $videos = time() . "." . $request->file('video')->getClientOriginalExtension();
     $request->file('video')->move(public_path('Videos'), $videos);
      $note['video'] = $videos;
    } else {
      $note['video'] = "null";
    }
    $file = time() . "." . $request->file('note')->getClientOriginalExtension();
    $request->file('note')->move(public_path('Notes'), $file);
    /* Note::create([
        'course_id'=>
        'chapter'=>$request->chapter,
        'title'=>$request->title,
        'note'=>$path1,
      ]);*/
    $note['course_id'] = $course->id;
    $note['chapter'] = $request->chapter;
    $note['title'] = $request->title;
    $note['note'] = $file;
    $newNote=Note::create($note);
// Get the students enrolled in the course
$students = User::where('semester_id', $course->semester_id)
->where('faculty_id', $course->faculty_id)
->get();
$course_name=$course->course;
 Notification::send($students,new NoteUploaded($course_name,$newNote->id));
 return redirect()->route('tutor.note_create', $course)->with('success', "Notes uploaded successfully");
 }


  

}


