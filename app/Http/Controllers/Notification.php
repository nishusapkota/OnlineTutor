<?php

namespace App\Http\Controllers;


use App\Models\Note;
use App\Models\Post;
use App\Models\Course;
use App\Models\Comment;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Notification extends Controller
{
    public function show(\App\Models\Assignment $assignment)
    {
        $user = Auth::user();
        $notifications = $user->unreadNotifications;
        $course=$assignment->course;
        return view('student.notification', compact('notifications','course','assignment'));
    }

    public function markAsRead($id)
{
    $notification = auth()->user()->notifications()->findOrFail($id);
    $notification->markAsRead();

    if (isset($notification->data['assignment_id'])) {
        $assignmentId = $notification->data['assignment_id'];
        $url = route('student.assignment.show', ['assignment' => $assignmentId]);
    } else if (isset($notification->data['note_id'])) {
        $noteId = $notification->data['note_id'];
        $url = route('student.note.show', ['note' => $noteId]);
    }else if (isset($notification->data['post_id'])) {
        $postId = $notification->data['post_id'];
        $url = route('student.post.show', ['post' => $postId]);
    } else {
        return back();
    }
    return redirect($url);    
}


public function showNote($id)
{
    $note = Note::findOrFail($id);
    $course_id=$note->course_id;
    $course=Course::where('id',$course_id)->first();
    return view('student.notes.show', compact('note','course'));
}

public function showPost($id)
{

 
    $post = Post::findOrFail($id);
    $course_id=$post->Course_id;
    $course=Course::where('id',$course_id)->first();
    return view('student.post.show', compact('post','course'));
}
}
