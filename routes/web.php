<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Http\Request;
use App\Task;


// Authentication Routes...
Route::auth();

/**
 * Show Task Dashboard
 */
Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', 'TaskController@index');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{task}', 'TaskController@destroy');
Route::get('/task/{task}', 'TaskController@edit');
Route::patch('/task/{task}', 'TaskController@update');
Route::get('/home', 'HomeController@index');
