<?php

use App\Http\Controllers\Api\AboutUsController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\MessageStoreController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\SettingsController;
use App\Http\Controllers\Api\SlidersController;
use App\Http\Controllers\Api\VideoController;
use App\Http\Controllers\Api\VisitorController;
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

 Route::get('nader', function () {
     return 'nader';
    });
    Route::post('message_store', [MessageStoreController::class,'store']);
    Route::get('sliders',[SlidersController::class , 'index']);
    Route::get('categories',[CategoriesController::class , 'index']);
    Route::get('news',[NewsController::class ,'index']);
    Route::get('news/show/{id}',[NewsController::class ,'show']);
    Route::get('news/category/{id}',[NewsController::class ,'news_category']);
   Route::get('about_us',[AboutUsController::class ,'index']);
   Route::get('contact_us',[ContactUsController::class ,'index']);
   Route::get('site/settings',[SettingsController::class ,'index']);
   Route::get('video',[VideoController::class ,'index']);
   Route::get('visitors',[VisitorController::class ,'store']);
