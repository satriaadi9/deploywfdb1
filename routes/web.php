<?php

use App\Models\Course;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\CourseController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello');
});

Route::view('/hi', 'hi');

Route::get('/halo', function(){
    return "This is a direct return without view";
})->name('halo');

Route::get('/hello/index',[FirstController::class, 'index'])->name('hello.index');

//Parameter in Route URL
Route::get('/hello/index2/{param}', [FirstController::class, 'index2']);

//Optional Parameter
Route::get('/hello/index3/{param?}', [FirstController::class, 'index3']);

//Combined Parameter
Route::get('/hello/index4/{param1}/{param2?}', [FirstController::class, 'index4']);

Route::get('/home', function () {
    return view('home', ['subject' => 'Web Framework and Deployment (B)']);
});

Route::get('/home/index/{param1}/{param2?}', [HomeController::class, 'index']);

Route::get('/about', function(){
    return view('about');
});

Route::get('/posts', function(){
    return view('posts');
});

Route::get('/tail', function(){
    return view('tail');
});

Route::get('/courses', function(){
    return view('courses', ['title'=> 'All Courses','courses'=>Course::with(['unit'])->get()]);
});

Route::get('/course/view/{course:id}', [CourseController::class, 'show']);

Route::get('/course/create', [CourseController::class, 'create'])->name('course.create');

Route::post('/course/insert', [CourseController::class, 'insert'])->name('course.insert');

Route::get('/course/edit/{course:id}', [CourseController::class, 'edit'])->name('course.edit');

Route::put('/course/update/{course:id}', [CourseController::class, 'update'])->name('course.update');

Route::delete('/course/delete/{course:id}', [CourseController::class, 'delete'])->name('course.delete');


// Route::get('/courses', function(){
//     return view('courses', ['title'=> 'All Courses','courses'=>Course::all()]);
// });

// Route::get('/course/{course:id}', function(Course $course){
//     return view('course', ['title'=> 'Course Details','course'=>$course]);
// });

// Route::get('/course/{course:id}', function(Course $course) {
//     $course->load(['unit', 'students']); // Eager load unit, students

//     $studentCount = $course->studentCount();
//     return view('course', [
//         'title' => 'Course Details',
//         'course' => $course,
//         'students' => $course->students,
//         'studentCount' => $studentCount
//     ]);
// });





