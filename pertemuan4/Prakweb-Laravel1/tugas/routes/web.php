<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController; 
use App\Http\Controllers\LoginController;   
use App\Http\Controllers\DashboardPostController;   
use App\Http\Controllers\DashboardCategoryController;
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


// Protect posts dan categories dengan auth middleware
// Route dari laraveltest-main
Route::get('/posts', [PostController::class, 'index'])->middleware('auth')->name('posts.index');

// Route Model Binding dengan slug
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->middleware('auth')->name('posts.show');

// Route untuk register - middleware guest (hanya untuk yang belum login)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');

// Route untuk login - middleware guest (hanya untuk yang belum login)
Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

// Route logout - hanya untuk yang sudah login
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route untuk dashboard posts - hanya untuk yang sudah login
// Index - Menampilkan semua posts milik user
Route::get('/dashboard', [DashboardPostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.index');

// Create - Form untuk membuat post baru
Route::get('/dashboard/create', [DashboardPostController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard.create');

// Store - Menyimpan post baru
Route::post('/dashboard', [DashboardPostController::class, 'store'])->middleware(['auth', 'verified']);

// Show - Menampilkan detail post berdasarkan slug
Route::get('/dashboard/{post:slug}', [DashboardPostController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard.show');

// Ini mencakup index, create, store, show, edit, update, dan destroy
Route::resource('dashboard/posts', DashboardPostController::class)->middleware(['auth', 'verified']);
?> 