<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\MenuController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\MemberController;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\Frontend\RegisterController;



Route::resource('/', IndexController::class)->only('index');

Route::resource('/blog', BlogController::class)->only(['index','show']);
Route::resource('/about', AboutController::class)->only('index');


Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('register.index');
    Route::post('/register/store', 'store')->name('register.store');
});
Route::prefix('menu')->controller(MenuController::class)->group(function () {
    Route::get('/show/{id}', 'show')->name('menu.show');
    Route::get('/sub-show/{id}', 'subShow')->name('menu.subShow');
});
Route::prefix('gallery')->controller(GalleryController::class)->group(function () {
    Route::get('/photo', 'photoGallery')->name('photoGallery.index');
    Route::get('/video', 'videoGallery')->name('videoGallery.index');
});

Route::resource('/member', MemberController::class)->only('index');
