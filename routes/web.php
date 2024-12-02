<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkController;
use App\Models\Work;

Route::get('/',[WorkController::class, 'index'])->name('home');
Route::get('/works/{id}', [WorkController::class, 'show'])->name('showDetail');
