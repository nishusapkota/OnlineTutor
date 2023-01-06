<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        if (auth()->user()->role == 'admin') {
            return redirect('/administrator');
        } else if (auth()->user()->role == 'teacher') {
            return redirect('/');
        } 
            return redirect('/');
        
    }
}
