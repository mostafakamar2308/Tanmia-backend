<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessagesController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\VideoController;
use App\Models\Message;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function()
    {

        Route::prefix('admin')->name('admin.')->group(function () {
            Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
            Route::get('/dashboard/news_chart', [DashboardController::class,'newsChart'])->name('news_chart');
            Route::get('/dashboard/count', [DashboardController::class,'count'])->name('count');


            Route::get('categories/data', [CategoryController::class,'data'])->name('categories.data');
            Route::post('categories/status', [CategoryController::class,'status'])->name('categories.status');
            Route::Delete('categories/bulk_delete', [CategoryController::class,'bulk_delete'])->name('categories.bulk_delete');
            Route::resource('categories', CategoryController::class)->except('show');


            Route::get('news/data', [NewsController::class,'data'])->name('news.data');
            Route::post('news/status', [NewsController::class,'status'])->name('news.status');
            Route::Delete('news/bulk_delete', [NewsController::class,'bulk_delete'])->name('news.bulk_delete');
            Route::resource('news', NewsController::class)->except('show');


            Route::get('sliders/data', [SliderController::class,'data'])->name('sliders.data');
            Route::post('sliders/status', [SliderController::class,'status'])->name('sliders.status');
            Route::Delete('sliders/bulk_delete', [SliderController::class,'bulk_delete'])->name('sliders.bulk_delete');
            Route::resource('sliders', SliderController::class)->except('show');

            Route::get('aboutUs/data', [AboutUsController::class,'data'])->name('aboutUs.data');
            Route::post('aboutUs/status', [AboutUsController::class,'status'])->name('aboutUs.status');
            Route::Delete('aboutUs/bulk_delete', [AboutUsController::class,'bulk_delete'])->name('aboutUs.bulk_delete');
            Route::resource('aboutUs', AboutUsController::class)->except('show');

            Route::get('contactUs/data', [ContactUsController::class,'data'])->name('contactUs.data');
            Route::post('contactUs/status', [ContactUsController::class,'status'])->name('contactUs.status');
            Route::Delete('contactUs/bulk_delete', [ContactUsController::class,'bulk_delete'])->name('contactUs.bulk_delete');
            Route::resource('contactUs', ContactUsController::class)->except('show');

            Route::get('settings/data', [SettingsController::class,'data'])->name('settings.data');
            Route::post('settings/status', [SettingsController::class,'status'])->name('settings.status');
            Route::Delete('settings/bulk_delete', [SettingsController::class,'bulk_delete'])->name('settings.bulk_delete');
            Route::resource('settings', SettingsController::class)->except('show');

            Route::get('messages/data', [MessagesController::class,'data'])->name('messages.data');
            Route::post('messages/status', [MessagesController::class,'status'])->name('messages.status');
            Route::Delete('messages/bulk_delete', [MessagesController::class,'bulk_delete'])->name('messages.bulk_delete');
            Route::post('messages/reply', [MessagesController::class,'reply'])->name('messages.reply');
            Route::resource('messages', MessagesController::class)->except('create','store','edit','update');


            Route::get('video/data', [VideoController::class,'data'])->name('video.data');
            Route::post('video/status', [VideoController::class,'status'])->name('video.status');
            Route::Delete('video/bulk_delete', [VideoController::class,'bulk_delete'])->name('video.bulk_delete');
            Route::resource('video', VideoController::class)->except('show');

            Route::get('users/data', [AdminController::class,'data'])->name('users.data');
            Route::post('users/status', [AdminController::class,'status'])->name('users.status');
            Route::Delete('users/bulk_delete', [AdminController::class,'bulk_delete'])->name('users.bulk_delete');
            Route::resource('users', AdminController::class)->except('show');

        });

    }
);

