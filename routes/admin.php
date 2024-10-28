<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\BackupController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SubMenuController;
use App\Http\Controllers\Auth\Role\RoleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryCatController;
use App\Http\Controllers\Admin\ProfessionController;
use App\Http\Controllers\Admin\VisitorInfoController;
use App\Http\Controllers\Admin\PhotoGalleryController;
use App\Http\Controllers\Admin\VideoGalleryController;
use App\Http\Controllers\Auth\Permission\PermissionController;

Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::controller(VisitorInfoController::class)->prefix('visitor-info')->name('visitorInfo.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/delete-selected', 'destroySelected')->name('destroySelected');
    Route::get('/delete-all', 'destroyAll')->name('destroyAll');
});


// !APP BACKUP
Route::controller(BackupController::class)->prefix('app-backup')->name('backup.')->group(function () {
    Route::get('/password', 'password')->name('password');
    Route::post('/checkPassword', 'checkPassword')->name('checkPassword');
    Route::get('/confirm', 'index')->name('index');
    Route::post('backup-file', 'backupFiles')->name('files');
    Route::post('backup-db', 'backupDb')->name('db');
    // Route::get('/restore','restoreLoad'])->name('restore');
    // Route::post('/restore/post','restore'])->name('restore.post');
    Route::post('/download/{name}/{ext}', 'downloadBackup')->name('download');
    Route::post('/delete/{name}/{ext}', 'deleteBackup')->name('delete');
});

// Global Ajax Route
Route::delete('delete-all/{model}', [AjaxController::class, 'deleteAll'])->name('delete_all');
Route::delete('force-delete-all/{model}', [AjaxController::class, 'forceDeleteAll'])->name('force_delete_all');
Route::get('select-2-ajax/{model}', [AjaxController::class, 'select2'])->name('select2');

Route::post('role/permission/{role}', [RoleController::class, 'assignPermission'])->name('role.permission');
Route::resource('role', RoleController::class);
Route::resource('permission', PermissionController::class);

// Route::controller(UserController::class)->prefix('user')->name('user.')->group(function () {
//     Route::get('/', 'index')->name('index');
//     Route::get('/create', 'create')->name('create');
//     Route::post('/store', 'store')->name('store');
//     Route::get('/edit/{id}', 'edit')->name('edit');
//     Route::post('/update', 'update')->name('update');
//     Route::any('/destroy/{id}', 'destroy')->name('destroy');
// });

Route::controller(ProfileController::class)->prefix('my-profile')->group(function () {
    Route::get('/', 'index')->name('myProfile.profile.index');
    Route::post('/update', 'update')->name('myProfile.profile.update');
});


Route::resource('user', UserController::class)->except(['show','create']);


Route::resource('/member', MemberController::class);

Route::prefix('my-profile')->group(function(){
    Route::prefix('profile')->group(function(){
        Route::get('/', [ProfileController::class, 'index'])->name('myProfile.profile.index');
        Route::post('/update', [ProfileController::class, 'update'])->name('myProfile.profile.update');
    });
});

Route::controller(BlogController::class)->prefix('blog')->group(function () {
    Route::get('/', 'index')->name('blog.index');
    Route::get('/create', 'create')->name('blog.create');
    Route::post('/store', 'store')->name('blog.store');
    Route::get('/edit/{id}', 'edit')->name('blog.edit');
    Route::put('/update/{id}', 'update')->name('blog.update');
    Route::get('/destroy/{id}', 'destroy')->name('blog.destroy');
});

Route::resource('/slider', SliderController::class);
Route::resource('/message', MessageController::class)->only('edit','update');
Route::resource('/about', AboutController::class)->only('edit','update');
Route::resource('/menu', MenuController::class);
Route::resource('/sub-menu', SubMenuController::class);
Route::resource('/photo-gallery', PhotoGalleryController::class,);
Route::resource('/video-gallery', VideoGalleryController::class);

Route::resource('/profession', ProfessionController::class);
Route::resource('/event', EventController::class);
Route::resource('/gallery-cat', GalleryCatController::class);

Route::controller(HeaderController::class)->group(function(){
    Route::get('/header','index')->name('header.index');
    Route::post('/header/textStore','textStore')->name('header.textStore');
    Route::post('/header/socialStore','socialStore')->name('header.socialStore');
    Route::get('/header/edit/{id}','edit')->name('header.edit');
    Route::post('/header/update/{id}','update')->name('header.update');
    Route::get('/header/destroy/{id}','destroy')->name('header.destroy');
});
