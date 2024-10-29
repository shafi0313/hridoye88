<?php

use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\SummerNoteController;
use Illuminate\Support\Facades\Route;

Route::get('/locale/{locale}', [LocalizationController::class, 'locale']);
Route::post('/summernote/image/destroy', [SummerNoteController::class, 'imageDestroy'])->name('summernote_image.destroy');
