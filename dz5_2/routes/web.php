<?php

use Illuminate\Support\Facades\Route;

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
});

Route::resource('titles', \App\Http\Controllers\TitleController::class);
Route::resource('professors', \App\Http\Controllers\ProfessorController::class);
Route::resource('departments', \App\Http\Controllers\DepartmentController::class);
