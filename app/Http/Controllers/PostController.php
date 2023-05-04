<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Course;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Notifications\PostUploaded;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    public function create_post(Course $course)
{
  return view('tutor.post_create',compact('course'));
}
public function upload_post(Request $request,Course $course)
{
    $post = $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'slug' => 'required|string|max:255',
        'body' => 'required|string',
    ]);
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $post['image'] = $imageName;
    }
    else{
        $post['image'] = "null";
    }

    $post['course_id']=$course->id;
    $post['title']=$request->title;
    $post['slug']=Str::slug($request->slug);
    $post['body']=$request->body;

 $newPost=Post::create($post);
  $students = User::where('semester_id', $course->semester_id)
->where('faculty_id', $course->faculty_id)
->get();
$course_name=$course->course;
 Notification::send($students,new PostUploaded($course_name,$newPost->id));
  return redirect()->back()->with('success','post created successfully.');
}




public function storeComment(Request $request, $postId)
{
    $validatedData = $request->validate([
        'comment' => 'required|string',
    ]);

    $comment = new Comment();
    $comment->comment = $validatedData['comment'];
    $comment->user_id = auth()->user()->id;
    $comment->post_id = $postId;

    if ($request->has('parent_id')) {
        $comment->parent_id = $request->input('parent_id');
    }

    $comment->save();

    return redirect()->back();
}

}



