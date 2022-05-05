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

//Route::resource('tasks', 'Api\TaskController');
Route::post('user', 'Api\UserController@index');
Route::post('tasks', 'Api\TaskController@postIndex');
Route::post('/tasks/store', 'Api\TaskController@store');
Route::put('/tasks/{id}',[Task::class,'update']);


