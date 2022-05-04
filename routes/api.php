<?php

use App\Http\Controllers\Api\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Task;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

<<<<<<< HEAD
//Route::resource('tasks', 'Api\TaskController');
Route::post('user', 'Api\UserController@index');
Route::post('tasks', 'Api\TaskController@postIndex');
=======
Route::resource('tasks', 'Api\TaskController');
Route::post('user', 'Api\UserController@index');
>>>>>>> 2f13ca3bdda38ae4aecca13bcbe53fddf27d8541
Route::put('/tasks/{id}',[Task::class,'update']);


