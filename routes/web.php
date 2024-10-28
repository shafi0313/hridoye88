<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SummerNoteController;
use App\Http\Controllers\LocalizationController;


Route::get('/locale/{locale}', [LocalizationController::class, 'locale']);
Route::post('/summernote/image/destroy', [SummerNoteController::class, 'imageDestroy'])->name('summernote_image.destroy');
