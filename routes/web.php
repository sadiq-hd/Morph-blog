<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Routes for registration and login
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'createNewUser'])->name('register');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes for posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/user-posts', 'PostController@userPosts')->name('posts.userPosts');
Route::get('/user-posts', [PostController::class, 'userPosts'])->name('posts.userPosts');
Route::get('/my-posts', [PostController::class, 'methodName'])->name('posts.myPosts');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');





Route::middleware(['auth'])->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::view('/admin-dashboard', 'admin-dashboard')->name('admin.dashboard.view');
});    

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
// Rest of the routes...

// Rest of the routes...
