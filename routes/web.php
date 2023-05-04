<?php

use Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\InstructorController;

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
//->middleware('auth','isAdmin')
Route::prefix('/administrator')->name('admin.')->group(function(){
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
    Route::get('/student/create',[\App\Http\Controllers\Admin\StudentController::class,'create'])->name('student.create');
    Route::POST('/student',[\App\Http\Controllers\Admin\StudentController::class,'store'])->name('student.store');
    Route::get('/students/{user}/edit',[\App\Http\Controllers\Admin\StudentController::class,'edit'])->name('students.edit');
    Route::PUT('/students/{user}',[\App\Http\Controllers\Admin\StudentController::class,'update'])->name('students.update');
    Route::get('students/{user}',[\App\Http\Controllers\Admin\StudentController::class,'show'])->name('students.show');
    Route::DELETE('/students/{user}',[\App\Http\Controllers\Admin\StudentController::class,'destroy'])->name('students.destroy');    
 
});

//Teacher Part
//->middleware('auth','IsTeacher')
Route::prefix('/tutor')->name('tutor.')->group(function(){
    Route::get('/',[\App\Http\Controllers\HomeController::class, 'tutorhomepage'])->name('homepage');
    Route::get('course/{course}',[\App\Http\Controllers\TutorController::class,'dashboardshow'])->name('course');
    Route::post('/assignment/{course}',[\App\Http\Controllers\TutorController::class,'upload_assignment'])->name('assignment.upload');
    Route::get('/assignment/{course}',[\App\Http\Controllers\TutorController::class,'index'])->name('assignment.index');
    Route::get('/uploaded_assignment/{assignment}',[\App\Http\Controllers\TutorController::class,'uploaded_assignment'])->name('uploaded_assignment');
    Route::get('show_assignment/{assignment}',[\App\Http\Controllers\TutorController::class,'show_assignment'])->name('show_assignment');
    Route::post('/remarks/{assignment}',[\App\Http\Controllers\TutorController::class,'remark'])->name('remarks');
    Route::get('/note/create/{course}',[\App\Http\Controllers\TutorController::class,'create_note'])->name('note_create');
    Route::post('/note/create/{course}',[\App\Http\Controllers\TutorController::class,'store_note'])->name('note_store');
    Route::get('/post/create/{course}',[\App\Http\Controllers\PostController::class,'create_post'])->name('create_post');
    Route::post('/post/{course}',[\App\Http\Controllers\PostController::class,'upload_post'])->name('post_upload');
    
});






//Student Part
Route::prefix('/student')->middleware('auth','isStudent')->name('student.')->group(function(){
    Route::get('/',[\App\Http\Controllers\HomeController::class, 'studenthomepage'])->name('homepage');
    Route::get('/course/{course}',[\App\Http\Controllers\StudentController::class,'course_index'])->name('course');
    Route::post('/assignment/{assignment}',[\App\Http\Controllers\StudentController::class,'upload_assignment'])->name('upload_assignment');
    Route::get('/post/{course}',[\App\Http\Controllers\StudentController::class,'post_index'])->name('post');
    Route::post('/comment/{post}',[\App\Http\Controllers\StudentController::class,'comment'])->name('comment');
    Route::get('/note/{course}',[\App\Http\Controllers\StudentController::class,'note_index'])->name('note');
    Route::get('/assignment/{assignment}', [\App\Http\Controllers\Notification::class,'show'])->name('assignment.show');
    Route::put('/notification/{id}/mark-as-read',[\App\Http\Controllers\Notification::class,'markAsRead'])->name('mark.notification.as.read');
    Route::get('/notes/{note}',[\App\Http\Controllers\Notification::class,'showNote'])->name('note.show');
    Route::get('/posts/{post}', [\App\Http\Controllers\Notification::class,'showPost'])->name('post.show');



});




Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('homepage');
})->name('logout');




