<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Mail\NewUserMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::where('role','student')->simplePaginate(7);
        return view('admin.students.index',compact('users'));
    }

    public function create()
    {
        return view('admin.students.create');
    }
    

    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'name'=>['required'],
            'email'=>['required','unique:users,email'],
            'password'=>['required',Password::min(6)->letters()->numbers()],
            'faculty_id'=>['required'],
            'semester_id'=>['required'],
        ]);
        $data = [
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ];
        Mail::to($validatedData['email'])->send(new NewUserMail($data));

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'semester_id'=>$request->semester_id,
            'faculty_id'=>$request->faculty_id,
        ]);
        return redirect()->route('admin.students.index');
    }
    public function show(User $user)
    {
        return view('admin.students.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.students.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>['required'],
            'email'=>['required'],
            'faculty'=>['required'],
            'semester'=>['required'],
            
        ]);
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'semester'=>$request->semester,
            'faculty'=>$request->faculty,
            
        ]);
        return redirect()->route('admin.students.index')->with('success','Student info updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.students.index')->with('success','Student Deleted Successfully');
        
    }
}
