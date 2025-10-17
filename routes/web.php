<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/uploadfile', [FileController::class, 'viewFiles']);
Route::post('/uploadfile', [FileController::class, 'uploadFile']);

Route::get('/register', [RegisterController::class, 'register']);

Route::get('api/get-users', [FileController::class, 'getUsers']);
Route::post('api/add-user', [FileController::class, 'addUser']);
