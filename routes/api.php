<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiBookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
 */

// GET BOOKS
Route::get('/books', [ApiBookController::class, 'index']);
Route::get('/books/{id}', [ApiBookController::class, 'show']);

Route::middleware('isApiUser')->group(function () {
    //CREATE BOOKS
    Route::post('/books/store', [ApiBookController::class, 'store']);
    //UPDATE BOOKS
    Route::post('/books/update/{id}', [ApiBookController::class, 'update']);

    //UPDATE BOOKS
    Route::get('/books/delete/{id}', [ApiBookController::class, 'delete']);

});
//LOGIN/REGISTER/

Route::post('/handle-login', [ApiAuthController::class, 'handleLogin']);
Route::post('/handle-register', [ApiAuthController::class, 'handleRegister']);
Route::post('/logout', [ApiAuthController::class, 'logout']);
