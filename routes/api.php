<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('login', LoginController::class)->name('login');
Route::post('register', RegisterController::class)->name('register');
