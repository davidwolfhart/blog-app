<?php

<<<<<<< HEAD
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('frontend/index');
});

Route::get('/login', [AuthController::class, 'showLogin'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::resource('/posts', PostController::class)->only(['index', 'show']);
Route::resource('/categories', CategoryController::class)->only(['index', 'show']);

Route::get('/dashboard', function () {
    return view('backend/index');
})->middleware('auth');

Route::get('/dashboard/categories/deleted', [DashboardCategoryController::class, 'deleted'])->middleware('auth');
Route::get('/dashboard/categories/{slug}/restore', [DashboardCategoryController::class, 'restore'])->middleware('auth');
Route::resource('/dashboard/users', DashboardUserController::class)->middleware('auth');
Route::resource('/dashboard/categories', DashboardCategoryController::class)->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
=======
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
>>>>>>> caff542facae210c01436af0469a396724c1fdd6
