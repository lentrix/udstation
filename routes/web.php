<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ModulesController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\TeacherController;
use App\Models\Activity;
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
    return view('home');
});

Route::get('/about', function() {
    return view('about');
});

Route::post('/',[SiteController::class, 'search']);

Route::get('/login',[SiteController::class,'loginForm'])->name('login');
Route::post('/login',[SiteController::class, 'login']);
Route::get('/logout',[SiteController::class, 'logout']);
Route::get('/register',[SiteController::class, 'registrationForm']);
Route::post('/register',[SiteController::class, 'register']);

Route::get('/dashboard', [TeacherController::class, 'dashboard']);

Route::get('/subjects/create',[SubjectsController::class, 'create']);
Route::get('/subjects/{subject}/edit',[SubjectsController::class, 'edit']);
Route::put('/subjects/{subject}',[SubjectsController::class,'update']);
Route::delete('/subjects/{subject}', [SubjectsController::class,'delete']);
Route::get('/subjects/{subject}/modules/create', [ModulesController::class, 'create']);
Route::post('/subjects/{subject}/modules', [ModulesController::class, 'store']);
Route::get('/subjects/{subject}',[SubjectsController::class, 'show']);
Route::post('/subjects',[SubjectsController::class,'store']);

Route::post('/modules/{module}/add-file',[ModulesController::class, 'upload']);
Route::get('/modules/{module}/delete-file/{file}', [ModulesController::class, 'deleteFile']);
Route::get('/modules/{module}/edit',[ModulesController::class, 'edit']);
Route::put('/modules/{module}',[ModulesController::class, 'update']);
Route::delete('/modules/{module}',[ModulesController::class, 'delete']);
Route::get('/modules/{module}', [ModulesController::class, 'show']);

Route::get('/public/subjects/{subject}', [PublicController::class, 'showSubject']);
Route::get('/public/modules/{module}', [PublicController::class, 'showModule']);

Route::post('/activities',[ActivityController::class,'store']);
Route::put('/activities/{activity}',[ActivityController::class, 'update']);
Route::delete('/activities/{activity}',[ActivityController::class,'delete']);
