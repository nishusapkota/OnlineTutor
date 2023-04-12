<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Mail\NewUserMail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class InstructorController extends Controller
{
    
    public $roles=['student','admin','teacher'];
    public function index()
    {
        $users=User::all()->where('role','teacher');
        return view('admin.instructor.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.instructor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'name'=>['required'],
            'email'=>['required','unique:users,email'],
            'password'=>['required',Password::min(6)->letters()->numbers()],
            'role'=>['required',Rule::in($this->roles)],
        ]);
        $data = [
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ];
        \Illuminate\Support\Facades\Mail::to($validatedData['email'])->send(new NewUserMail($data));

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'role'=>$request->role,
        ]);
       
        // Send an email to the new user

        
        return redirect()->route('admin.instructor.index')->with('success','Instructor added successfully and Mail sent');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.instructor.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.instructor.edit',compact('user'));
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
            'email'=>['required','unique:users,email'.$user->id]
        ]);
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        return redirect()->route('admin.instructor.index')->with('success','Instructor info updated successfully');
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
        return redirect()->route('admin.instructor.index')->with('success','Instructor Deleted Successfully');
    }
}
