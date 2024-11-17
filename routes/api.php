<?php

use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function(){
    return 'Test API';
});

Route::get('/get/courses/{id}', [CourseController::class, 'api_get_courses']);

Route::get('/get/token', [CourseController::class, 'api_get_token']);
