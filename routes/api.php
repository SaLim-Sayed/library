<?php

use App\Http\Controllers\ApiBookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/


// GET BOOKS
Route::get('/books', [ApiBookController::class, 'index']);
Route::get('/books/{id}', [ApiBookController::class, 'show']);

//CREATE BOOKS
Route::post('/books/store', [ApiBookController::class, 'store']);
//UPDATE BOOKS
Route::post('/books/update/{id}', [ApiBookController::class, 'update']);

//UPDATE BOOKS
Route::get('/books/delete/{id}', [ApiBookController::class, 'delete']);



