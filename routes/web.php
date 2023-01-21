<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.welcome');
});

// Route::get('/books', 'App\Http\Controllers\BookController@index');
Route::middleware('isLogin')->group(function () {

    #Books Read
    Route::get('books', [BookController::class, 'index'])->name('books.index');
    Route::get('books/search', [BookController::class, 'search'])->name('books.search');

    Route::get('/books/show/{id}', [BookController::class, 'show'])->name('books.show');

#Category Read
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');

    Route::get('/categories/show/{id}', [CategoryController::class, 'show'])->name('categories.show');

#Books: create
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

    Route::post('/books/store', [BookController::class, 'store'])->name('books.store');

# update books

    Route::get('/books/edit/{id}', [BookController::class, 'edit'])->name('books.edit');
    Route::post('/books/update/{id}', [BookController::class, 'update'])->name('books.update');

#categories: create
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');

# update categories

    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
#user logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    #notes: create
    Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');

    Route::post('/notes/store', [NoteController::class, 'store'])->name('notes.store');

});

Route::middleware('isLoginAdmin')->group(function () {
# Book:Delete
    Route::get('/books/delete/{id}', [BookController::class, 'delete'])->name('books.delete');

# Category:Delete
    Route::get('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');

});

Route::middleware('isGuest')->group(function () {

#user registration
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/handle-register', [AuthController::class, 'handleRegister'])->name('auth.handleRegister');

#user login
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/handle-login', [AuthController::class, 'handlelogin'])->name('auth.handleLogin');

    //GITHUB
    Route::get('login/github', [AuthController::class, 'redirectToProvider'])->name('auth.github.redirect');
    Route::get('login/github/callback', [AuthController::class, 'handleProviderCallback'])->name('auth.github.callback');

});

Route::get('welcome', [AuthController::class, 'welcome'])->name('auth.welcome');
