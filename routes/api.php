<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;
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


//Route::get('/schools', 'App\Http\Controllers\SchoolController@index');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
