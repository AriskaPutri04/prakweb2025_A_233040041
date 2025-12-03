<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

//  Route untuk menampilkan View
Route::get('/', function () {
    return view('welcome');
});

// Route untuk Memanggil Method pada Controller 
Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::view('/', 'home');
Route::view('/about', 'about');
Route::view('/blog', 'blog');
Route::view('/contact', 'contact'); 

?> 