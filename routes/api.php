<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserHomeController;
use App\Payme\Facades\Payme;
use App\Payme\Http\Middleware\PaymeCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::controller(MainController::class)->group(function () {
    Route::get('settings', 'index');
    Route::get('banners', 'banner');
    Route::get('works', 'work');
    Route::get('advantages', 'advantage');
    Route::get('faqs', 'faq');
    Route::get('question-answer', 'questionAnswer');
    Route::get('partners', 'partner');
    Route::get('services', 'service');
    Route::get('services/{id}', 'serviceDetail');
    Route::get('process', 'process');
    Route::get('testimonials','testimonial');
    Route::get('plans','plan');
    Route::get('seo','seo');
    Route::post('application','application');
    Route::post('order','order');
    Route::post('send/question', 'sendQuestion');
});

Route::prefix('/user')
    ->group(function () {
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/register/confirm', [AuthController::class, 'registerConfirm']);
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
        Route::post('/forgot-password/confirm', [AuthController::class, 'forgotPasswordConfirm']);
        Route::post('/forgot-password/new-password', [AuthController::class, 'forgotPasswordNewPassword']);
        Route::prefix('auth')->group(function () {
            Route::get('/{provider}/redirect', [AuthController::class, 'redirectToProvider']);
            Route::get('/{provider}/callback', [AuthController::class, 'handleProviderCallback']);
        });
        Route::middleware(['auth:sanctum'])->group(function () {
            Route::post('/logout', [AuthController::class, 'logout']);
            Route::post('/delete', [AuthController::class, 'delete']);
            Route::post('/send/question', [UserController::class, 'sendQuestion']);
            Route::prefix('/profile')->group(function () {
                Route::post('equipment/add',[ProfileController::class, 'addEquipment']);
                Route::post('equipment/delete/{id}',[ProfileController::class, 'deleteEquipment']);
                Route::get('equipments',[ProfileController::class, 'equipment']);
                Route::get('/info', [ProfileController::class, 'profileInfo']);
                Route::post('/update', [ProfileController::class, 'profileUpdate']);
                Route::post('/change-password', [ProfileController::class, 'changePassword']);
            });
            Route::prefix('/notifications')
                ->group(function () {
                    Route::get('/', [NotificationController::class, 'index']);
                    Route::get('/{id}', [NotificationController::class, 'detail']);
                });
            Route::prefix('/orders')
                ->group(function () {
                    Route::get('/get', [OrderController::class, 'index']);
                    Route::get('/get/{id}', [OrderController::class, 'detail']);
                    Route::post('/create', [OrderController::class, 'create']);
                    Route::post('/leave/comment', [OrderController::class, 'comment']);
                });

            Route::prefix('/home')->controller(UserHomeController::class)
                ->group(function () {
                    Route::get('/', 'index');
                    Route::post('/create/', 'create');
                    Route::post('/update/{id}', 'update');
                    Route::delete('/delete/{id}', 'delete');
                    Route::prefix('/equipments')->group(function () {
                        Route::get('/', 'equipment');
                        Route::post('/create', 'equipmentCreate');
                        Route::post('/update/{id}', 'equipmentUpdate');
                        Route::delete('/delete/{id}', 'equipmentDelete');
                    });

                });
            Route::prefix('/plans')
                ->group(function () {
                    Route::get('/get', [UserController::class, 'plan']);
                    Route::post('/complete', [UserController::class, 'planComplete']);
                    Route::post('/create', [UserController::class, 'planCreate']);
                    Route::get('/today', [UserController::class, 'planToday']);
                });
            Route::get('generate/payme/url', [UserController::class, 'paymeUrl']);
            Route::post('payment/history', [UserController::class, 'paymentHistory']);
        });
    });

Route::any('/payme', function (Request $request) {
    return Payme::handle($request);
})->middleware(PaymeCheck::class);



