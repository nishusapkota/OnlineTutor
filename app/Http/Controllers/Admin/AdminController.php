<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $teacher=User::all()->where('role','teacher');
        $student=User::all()->where('role','student');
    
        return view('admin.index',compact('teacher','student'));
    }
}
