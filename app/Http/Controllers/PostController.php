<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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

  Post::create($post);
  return redirect()->back()->with('success','post created successfully.');
}
}



