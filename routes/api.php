<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\UserMiddleware;

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
// Route::resource('schools', 'SchoolController');
// Route::get('schools', 'SchoolController@index');
// Route::post('schools', 'SchoolController@store');
// Route::get('schools/{id}', 'SchoolController@show');
// Route::put('schools/{id}', 'SchoolController@update');
// Route::delete('schools/{id}', 'SchoolController@destroy');

Route::get('/schools',[SchoolController::class,'index']);
Route::post('/schools',[SchoolController::class,'store']);
Route::put('/schools/{id}',[SchoolController::class,'update']);
Route::get('/schools/{id}',[SchoolController::class,'show']);
Route::delete('schools/{id}',[SchoolController::class,'destroy']);



Route::post('/Courses',[CourseController::class,'store']);
Route::put('/Courses/{id}',[CourseController::class,'update']);
Route::get('/Courses',[CourseController::class,'index']);
Route::get('/Courses/{id}',[CourseController::class,'show']);
Route::delete('Courses/{id}',[CourseController::class,'destroy']);


Route::post('/Enrollments',[EnrollmentController::class,'store']);
Route::put('/Enrollments/{id}',[EnrollmentController::class,'update']);
Route::get('/Enrollments',[EnrollmentController::class,'index']);
Route::get('/Enrollments/{id}',[EnrollmentController::class,'show']);
Route::delete('Enrollments/{id}',[EnrollmentController::class,'destroy']);


//Route::post('/Users',[UserController::class,'store']);
//Route::put('/Users/{id}',[UserController::class,'update']);
Route::get('/Users',[UserController::class,'index']);
Route::get('/Users/{id}',[UserController::class,'show']);
//Route::delete('/Users/{id}',[UserController::class,'destroy'])->middleware('auth.user');
Route::post('/Users/login',[UserController::class,'login'])->middleware('auth.user');

/* Route::post('Users/register', [UserController::class, 'register'])->middleware('auth.user');
 */
Route::middleware(['auth:api'])->group(function(){
    Route::post('Users/register', [UserController::class, 'register']);
    Route::delete('/Users/{id}',[UserController::class,'destroy']);
    Route::put('/Users/{id}',[UserController::class,'update']);
    Route::post('/Users',[UserController::class,'store']);
});

/* Route::group(['middleware' => 'auth.user'], function () {
    Route::post('/Users/register',[UserController::class,'register']);
});
 */

//Route::get('/schools', 'App\Http\Controllers\SchoolController@index');


/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
