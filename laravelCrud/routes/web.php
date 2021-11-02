<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TasksController;


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
    Route::get('/', [TasksController::class, 'list']);

    Route::get('/create', [TasksController::class, 'create']);
    Route::post('/create', [TasksController::class, 'createAction']);

    Route::get('/edit{id}', [TasksController::class, 'edit']);
    Route::post('/edit{id}', [TasksController::class, 'editAction']);

    Route::get('/delete{id}', [TasksController::class, 'delete']);

    Route::get('/solved{id}', [TasksController::class, 'done']);
});
