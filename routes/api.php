<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('carousels', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('settings', [\App\Http\Controllers\SettingController::class, 'index']);
Route::get('products', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('products/detail/{id}', [\App\Http\Controllers\ProductController::class, 'detail']);
Route::post('products/comment/create', [\App\Http\Controllers\ProductController::class, 'createComment']);
Route::get('partners', [\App\Http\Controllers\PartnerController::class, 'index']);
Route::get('faqs', [\App\Http\Controllers\FaqController::class, 'index']);
Route::get('posts', [\App\Http\Controllers\PostController::class, 'index']);
Route::get('posts/detail/{id}', [\App\Http\Controllers\PostController::class, 'detail']);
Route::get('consultation', [\App\Http\Controllers\SettingController::class, 'consultation']);
Route::post('application/create', [\App\Http\Controllers\SettingController::class, 'createApplication']);
Route::get('testimonials', [\App\Http\Controllers\TestimonialController::class, 'index']);
Route::get('about', [\App\Http\Controllers\SettingController::class, 'about']);
