<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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

Route::get('/', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'create']);
Route::get('/tasks', [TaskController::class, 'all']);
Route::get('/tasks/{id}', [TaskController::class, 'getTask']);
Route::put('/tasks/{id}', [TaskController::class, 'edit']);
Route::delete('/tasks/{id}', [TaskController::class, 'delete']);
Route::put('/tasks/completed/{id}', [TaskController::class, 'completed']);