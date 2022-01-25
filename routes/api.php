<?php

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/search',function(Request $request) {
    $key = $request->search_key;
    $subjects = Subject::where('course_no', 'like', "%$key%")
        ->orWhere('description','like',"%$key%")->get();

    return response()->json($subjects);
});
