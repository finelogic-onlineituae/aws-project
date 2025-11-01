<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/uploadfile', [FileController::class, 'viewFiles']);
Route::post('/uploadfile', [FileController::class, 'uploadFile']);

Route::get('/register', [RegisterController::class, 'register']);

Route::get('api/get-users', [FileController::class, 'getUsers']);
Route::post('api/add-user', [FileController::class, 'addUser']);

Route::get('api/get-tasks', [TaskController::class, 'index']);
Route::post('api/add-task', [TaskController::class, 'create']);

Route::get('/api/blogs', [BlogController::class, 'index']);
Route::get('/api/blogs/{id}', [BlogController::class, 'show']);
Route::post('/api/blogs', [BlogController::class, 'store']);

Route::put('/api/blogs/{id}', [BlogController::class, 'update']);
