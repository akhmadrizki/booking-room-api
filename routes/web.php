<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\RoomController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/wellcome', [DashboardController::class, 'index'])->name('index.wellcome');
    Route::get('/list-room', [RoomController::class, 'indexRoom'])->name('index.room');
    Route::get('/list-room/add', [RoomController::class, 'addRoom'])->name('add.room');
    Route::get('/list-booked', [RoomController::class, 'indexList'])->name('index.list');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
