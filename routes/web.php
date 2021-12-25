<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

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
    return view('welcome');
});

Route::post('/login',[LoginController::class, 'authenticate'] );
Route::post('/createuser',[UserController::class, 'store'] );
Route::post('/tareas/crear', [TaskController::class, 'store']);
Route::get('/tareas/consultar/{id?}/{token?}', [TaskController::class, 'getMyTask']);
Route::get('/tareas/consultar/pendientes/{id?}/{token?}', [TaskController::class, 'getMyPendingTasks']);
Route::get('/tareas/consultar/finalizadas/{id?}/{token?}', [TaskController::class, 'getMyFinishedTasks']);
Route::get('/tareas/consultar/fecha/{id?}/{token?}', [TaskController::class, 'getMyTasksByDue']);
Route::post('/tareas/actualizar', [TaskController::class, 'update']);
Route::post('/tareas/borrar', [TaskController::class, 'deletTask']);
Route::post('/tareas/completar', [TaskController::class, 'completTask']);
