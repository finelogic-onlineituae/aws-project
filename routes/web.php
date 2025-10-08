<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/uploadfile', [FileController::class, 'viewFiles']);
Route::post('/uploadfile', [FileController::class, 'uploadFile']);
