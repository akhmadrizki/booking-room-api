<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::get('notification', [UserController::class, 'notifTest']);

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('room-list-meeting', [RoomController::class, 'indexMeeting']);
    Route::get('room-list-workshop', [RoomController::class, 'indexWorkshop']);
    Route::get('room-list-seminar', [RoomController::class, 'indexSeminar']);
    Route::get('room-detail/{id}', [RoomController::class, 'roomDetail']);

    Route::get('category-list', [CategoryController::class, 'index']);
    Route::post('logout', [UserController::class, 'logout']);
});
