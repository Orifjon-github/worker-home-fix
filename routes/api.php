<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FireBaseController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkerRatingController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('/user')
    ->group(function () {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
        Route::post('/forgot-password/confirm', [AuthController::class, 'forgotPasswordConfirm']);
        Route::post('/forgot-password/new-password', [AuthController::class, 'forgotPasswordNewPassword']);
        Route::middleware(['auth:sanctum'])->group(function () {
            Route::post('/logout', [AuthController::class, 'logout']);
            Route::prefix('/profile')->group(function () {
                Route::get('/info', [ProfileController::class, 'profileInfo']);
                Route::post('/update', [ProfileController::class, 'profileUpdate']);
                Route::post('/change-password', [ProfileController::class, 'changePassword']);
            });
            Route::prefix('/notifications')
                ->group(function () {
                    Route::get('/', [NotificationController::class, 'index']);
                    Route::get('/{id}', [FireBaseController::class, 'detail']);
                    Route::get('/read/all', [NotificationController::class, 'readAll']);
                });
            Route::prefix('/tasks')->group(function () {
                Route::get('/me', [TaskController::class, 'me']);
                Route::get('/status', [TaskController::class, 'index']);
                Route::get('/show/{id}', [TaskController::class, 'show']);
                Route::post('/get-equipments', [TaskController::class, 'getEquipment']);
                Route::post('/date-update', [TaskController::class, 'updateDate']);
            });
            Route::prefix('/rating')->group(function () {
                Route::post('/set-worker-rating', [WorkerRatingController::class, 'store']);
            });
        });
    });
