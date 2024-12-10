<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FollowController;
use App\Http\Controllers\Api\WorkController;

Route::get('/follow',[FollowController::class, 'index'])->name('apiFollow');
Route::get('/follow/{id}',[FollowController::class, 'show'])->name('apiShowFollow');
Route::delete('/follow/{id}',[FollowController::class, 'destroy'])->name('apiDeleteFollow');
Route::post('/follow',[FollowController::class, 'store'])->name('apiCreateFollow');
Route::put('/follow/{id}',[FollowController::class, 'update'])->name('apiUpdateFollow');

Route::get('/work',[WorkController::class, 'index'])->name('apiWork');
Route::get('/work/{id}',[WorkController::class, 'show'])->name('apiShowWork');
Route::delete('/work/{id}',[WorkController::class, 'destroy'])->name('apiDeleteWork');
Route::post('/work',[WorkController::class, 'store'])->name('apiCreateWork');
Route::put('/work/{id}',[WorkController::class, 'update'])->name('apiUpdateWork');
