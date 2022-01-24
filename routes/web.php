<?php

use App\Http\Controllers\ModulesController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\TeacherController;
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
    return view('base');
});

Route::get('/login',[SiteController::class,'loginForm'])->name('login');
Route::post('/login',[SiteController::class, 'login']);
Route::get('/logout',[SiteController::class, 'logout']);
Route::get('/register',[SiteController::class, 'registrationForm']);
Route::post('/register',[SiteController::class, 'register']);

Route::get('/dashboard', [TeacherController::class, 'dashboard']);

Route::get('/subjects/{subject}/modules/create', [ModulesController::class, 'create']);
Route::post('/subjects/{subject}/modules', [ModulesController::class, 'store']);
Route::get('/modules/{module}', [ModulesController::class, 'show']);
Route::post('/modules/{module}/add-file',[ModulesController::class, 'upload']);
Route::get('/modules/{module}/delete-file/{file}', [ModulesController::class, 'deleteFile']);

Route::get('/subjects/{subject}',[SubjectsController::class, 'show']);
Route::get('/subjects/create',[SubjectsController::class, 'create']);
Route::post('/subjects',[SubjectsController::class,'store']);

