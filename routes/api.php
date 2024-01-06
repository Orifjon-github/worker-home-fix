<?php

use App\Http\Controllers\MainController;
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
    Route::get('partners', 'partner');
    Route::get('banners', 'banner');
    Route::get('about', 'about');
    Route::get('services', 'service');
    Route::get('projects', 'project');
    Route::get('posts','post');
    Route::get('posts/detail/{id}', 'postDetail');
    Route::get('projects/detail/{id}', 'projectDetail');
    Route::get('services/detail/{id}', 'serviceDetail');
    Route::get('histories/detail/{id}', 'historyDetail');
    Route::get('gallery', 'gallery');
    Route::post('application/create', 'createApplication');
});


//Route::get('consultation', [\App\Http\Controllers\MainController::class, 'consultation']);
//Route::get('products', [\App\Http\Controllers\ProductController::class, 'index']);
//Route::get('products/detail/{id}', [\App\Http\Controllers\ProductController::class, 'detail']);
//Route::post('products/comment/create', [\App\Http\Controllers\ProductController::class, 'createComment']);
//Route::get('faqs', [\App\Http\Controllers\FaqController::class, 'index']);
//Route::get('testimonials', [\App\Http\Controllers\TestimonialController::class, 'index']);
//Route::get('advertising', [\App\Http\Controllers\AdvertisingController::class, 'index']);
