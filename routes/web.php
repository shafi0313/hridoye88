<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalizationController;


Route::get('/locale/{locale}', [LocalizationController::class, 'locale']);
