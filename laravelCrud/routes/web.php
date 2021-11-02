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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/tasks')->group(function(){
    Route::get('/', 'tasksController@list');

    Route::get('/create', 'tasksController@create');
    Route::post('/create', 'tasksController@createAction');

    Route::get('/edit{id}', 'tasksController@edit');
    Route::post('/edit{id}', 'tasksController@editAction');

    Route::get('/delete{id}', 'tasksController@delete');

    Route::get('/solved{id}', 'tasksController@done');
});
