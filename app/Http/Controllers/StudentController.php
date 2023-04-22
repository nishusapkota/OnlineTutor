<?php

namespace App\Http\Controllers;
use App\Models\Note;

use App\Models\Post;
use App\Models\User;
use App\Models\Course;
use App\Models\Comment;
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
        $filename=time().".".$request->file('file')->getClientOriginalExtension();
        $path=$request->file('file')->storeAs('public/assignments',$filename);
      
        StudentAssignment::create([
            'assignment_id'=>$assignment->id,
            'student_assignment'=>$filename,
            'user_id'=>$id,
         ]);
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
}
