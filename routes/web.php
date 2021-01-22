<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Dashboard\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\RoomController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [LoginController::class, 'index'])->name('admin');

Route::prefix('/')->group(function () {
    Route::get('/login', function () {
        return redirect()->to('/');
    })->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // Password Reset Routes...
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/wellcome', [DashboardController::class, 'index'])->name('index.wellcome');

        // Route Room
        Route::get('/list-room', [RoomController::class, 'indexRoom'])->name('index.room');
        Route::get('/list-room/add', [RoomController::class, 'addRoom'])->name('add.room');
        Route::post('/list-room/add', [RoomController::class, 'storeRoom']);
        Route::get('/list-room/edit/{id}', [RoomController::class, 'editRoom'])->name('edit.room');
        Route::post('list-room/update/{id}', [RoomController::class, 'updateRoom'])->name('update.room');
        Route::delete('/list-room/delete/{id}', [RoomController::class, 'destroyRoom'])->name('delete.room');
        // End Route Room

        Route::get('/list-booked', [RoomController::class, 'indexList'])->name('index.list');

        Route::get('/list-category', [CategoryController::class, 'index'])->name('index.category');
        Route::post('/list-category/store', [CategoryController::class, 'store'])->name('add.category');
    });
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
