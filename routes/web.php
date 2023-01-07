<?php

use Admin\AdminController;
use App\Http\Controllers\Admin\CourseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('homepage');


Route::get('/home',[\App\Http\Controllers\HomeController::class,'home'])->middleware('auth')->name('home');


//Admin Part
Route::prefix('/administrator')->middleware('auth','isAdmin')->name('admin.')->group(function(){
    Route::get('/',[\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');
    //crud
    Route::resource('faculties',\App\Http\Controllers\Admin\FacultyController::class); 
    Route::resource('course',\App\Http\Controllers\Admin\CourseController::class);
    
    Route::get('/instructor',[\App\Http\Controllers\Admin\InstructorController::class,'index'])->name('instructor.index');
    Route::get('/instructor/create',[\App\Http\Controllers\Admin\InstructorController::class,'create'])->name('instructor.create');
    Route::POST('/instructor',[\App\Http\Controllers\Admin\InstructorController::class,'store'])->name('instructor.store');
    Route::get('/instructor/{user}/edit',[\App\Http\Controllers\Admin\InstructorController::class,'edit'])->name('instructor.edit');
    Route::PUT('/instructor/{user}',[\App\Http\Controllers\Admin\InstructorController::class,'update'])->name('instructor.update');
    Route::get('/instructor/{user}',[\App\Http\Controllers\Admin\InstructorController::class,'show'])->name('instructor.show');
    Route::DELETE('/instructor/{user}',[\App\Http\Controllers\Admin\InstructorController::class,'destroy'])->name('instructor.destroy');

    Route::get('/students',[\App\Http\Controllers\Admin\StudentController::class,'index'])->name('students.index');
    Route::get('/students/{user}/edit',[\App\Http\Controllers\Admin\StudentController::class,'edit'])->name('students.edit');
    Route::PUT('/students/{user}',[\App\Http\Controllers\Admin\StudentController::class,'update'])->name('students.update');
    Route::get('students/{user}',[\App\Http\Controllers\Admin\StudentController::class,'show'])->name('students.show');
    Route::DELETE('/students/{user}',[\App\Http\Controllers\Admin\StudentController::class,'destroy'])->name('students.destroy');    
 
});

//Teacher Part
Route::prefix('/tutor')->middleware('auth','isTeacher')->name('tutor.')->group(function(){
    Route::get('/',[\App\Http\Controllers\HomeController::class, 'tutorhomepage'])->name('homepage');

});





//Student Part
Route::prefix('/student')->middleware('auth','isStudent')->name('student.')->group(function(){
    Route::get('/',[\App\Http\Controllers\HomeController::class, 'studenthomepage'])->name('homepage');

});




Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('homepage');
})->name('logout');




