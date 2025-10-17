<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

Route::get('api/get-users', [FileController::class, 'getUsers']);
