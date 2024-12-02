<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FollowController;

Route::get('/follow',[FollowController::class, 'index'])->name('apiFollow');
Route::delete('/follow/{id}',[FollowController::class, 'destroy'])->name('apiDeleteFollow');
Route::post('/follow',[FollowController::class, 'store'])->name('apiCreateFollow');
Route::put('/follow/{id}',[FollowController::class, 'update'])->name('apiUpdateFollow');
