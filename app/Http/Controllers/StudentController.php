<?php

namespace App\Http\Controllers;
use App\Models\Note;

use App\Models\Post;
use App\Models\User;
use App\Models\Course;
use App\Models\Comment;
use App\Models\Faculty;
use App\Models\Remarks;
use App\Models\Semester;
use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Models\StudentAssignment;
use Illuminate\Support\Facades\Auth;
use App\Notifications\AssignmentSubmitted;
use Illuminate\Support\Facades\Notification;

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
       $request->validate([
            'file' => 'required|file|mimes:pdf,docx,txt',
        ]);
        $id=Auth::user()->id;
        $filename=time().".".$request->file('file')->getClientOriginalExtension();
        $path=$request->file('file')->move(public_path('student_assignment'), $filename);
      
       $studentAssignment=StudentAssignment::create([
            'assignment_id'=>$assignment->id,
            'student_assignment'=>$filename,
            'user_id'=>$id,
        ]);

$course_id=$assignment->course_id;
$course=Course::where('id',$course_id)->first();
$user_id=$course->user_id;
$tutor=User::where('id',$user_id)->first();

Notification::send($tutor, new AssignmentSubmitted($studentAssignment));
       return redirect()->back();
    }

    public function post_index(Course $course)
    {
       
        $semid=$course->semester_id;
        $cid=$course->id;
        $fid=$course->faculty_id;
        $comments=Comment::all();
       $users=User::all()->where('semester_id',$semid)->where('faculty_id',$fid);
       $posts = Post::with('comments.replies', 'course')->latest()->paginate(3);
    
     return view('student.post',compact('course','semid','fid','posts'));
    }
    public function comment(Request $request,Post $post)
    {
        // Validate the request data
    $validatedData = $request->validate([
        'comment' => 'required|string|max:500',
    ]);

    // Create a new comment instance
    $comment = new Comment;
    $comment->user_id = auth()->user()->id; // Set the user_id to the current authenticated user's id
    $comment->post_id = $post->id; // Set the post_id to the id of the post being commented on
    $comment->comment = $validatedData['comment'];

    // If this is a reply to another comment, set the parent_id to that comment's id
    if ($request->has('parent_id')) {
        $comment->parent_id = $request->input('parent_id');
    }

    $comment->save(); // Save the comment to the database

    return redirect()->back();     
    }



    public function note_index(Course $course)
    {
       $semid=$course->semester_id;
        $cid=$course->id;
        $fid=$course->faculty_id;
        $notes=Note::where('course_id',$cid)->Paginate(2);
        
     return view('student.note',compact('course','semid','fid','notes'));  
    }
    public function showAssignment(Assignment $id)
    {
        // Retrieve the assignment using the Assignment model
        $assignment = Assignment::findOrFail($id);
    
        // Return a view that displays the assignment details
        return view('student.assignment.show', [
            'assignment' => $assignment
        ]);
    }

    public function showRemarks($id)
    {
        $remark=Remarks::where('id',$id)->first();
        $assignment=$remark->student_assignment->assignment;
        $student_assignment=$remark->student_assignment;
        
        $course_id=$assignment->course_id;
        $course=Course::where('id',$course_id)->first();
        $name=$course->course;
    
        $semid = $course->semester_id;
        $semester=Semester::where('id',$semid)->first();
        $sem=$semester->sem;
    
        $fid = $course->faculty_id;
        $faculty=Faculty::where('id',$fid)->first();
        $faculty=$faculty->name;


        
        return view('student.remark',compact('name','student_assignment','remark','sem','faculty','course'));
    }
    

}
