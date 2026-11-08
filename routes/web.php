<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('/');

Route::resource('modules', ModuleController::class);
Route::resource('teachers', TeacherController::class);
Route::resource('students', StudentController::class);
