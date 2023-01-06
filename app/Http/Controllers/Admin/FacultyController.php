<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faculty;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties=Faculty::all();
        return view('admin.faculties.index',compact('faculties'));
    }
    public function show(Faculty $faculty)
    {
        return view('admin.faculties.show',compact('faculty'));
        
    }
    public function create()
    {
        return view('admin.faculties.create');
    }
public function store(Request $request)
{
    $request->validate([
        'name'=>['required'],
    ]);
    Faculty::create([
        'name'=>$request->name,
    ]);
    return redirect()->route('admin.faculties.index')->with('success','Faculty created successfully');
}

    public function edit(Faculty $faculty)
    {
        return view('admin.faculties.edit',compact('faculty'));
    }
    public function update(Request $request,Faculty $faculty)
    {
        $request->validate([
            'name'=>['required']
        ]);
        $faculty->update([
            'name'=>$request->name,
        ]);
        return redirect()->route('admin.faculties.index')->with('success','Faculty updated successfully');
    }
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        return redirect()->route('admin.faculties.index')->with('success','Faculty Deleted Successfully');
    }
}
