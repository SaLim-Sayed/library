<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;

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

// Route::get('/books', 'App\Http\Controllers\BookController@index');

#Books Read
Route::get('books', [BookController::class,'index'])->name('books.index');

Route::get('/books/show/{id}',[BookController::class,'show'])->name('books.show');


#Books: create
Route::get('/books/create',[BookController::class,'create'])->name('books.create');


Route::post('/books/store',[BookController::class,'store'])->name('books.store');

# update books

Route::get('/books/edit/{id}',[BookController::class,'edit'])->name('books.edit');
Route::post('/books/update/{id}',[BookController::class,'update'])->name('books.update');

# Book:Delete
Route::get('/books/delete/{id}',[BookController::class,'delete'])->name('books.delete');


#Books Read
Route::get('categories', [CategoryController::class,'index'])->name('categories.index');

Route::get('/categories/show/{id}',[CategoryController::class,'show'])->name('categories.show');


#categories: create
Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');


Route::post('/categories/store',[CategoryController::class,'store'])->name('categories.store');

# update categories

Route::get('/categories/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');
Route::post('/categories/update/{id}',[CategoryController::class,'update'])->name('categories.update');

# Category:Delete
Route::get('/categories/delete/{id}',[CategoryController::class,'delete'])->name('categories.delete');


#user registration
Route::get('/register',[AuthController::class,'register'])->name('auth.register');
Route::post('/handle-register',[AuthController::class,'handleRegister'])->name('auth.handleRegister');

#user login
Route::get('/login',[AuthController::class,'login'])->name('auth.login');
Route::post('/handle-login',[AuthController::class,'handlelogin'])->name('auth.handleLogin');

#user logout
Route::get('/logout',[AuthController::class,'logout'])->name('auth.logout');
