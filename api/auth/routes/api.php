<?php

use Illuminate\Support\Facades\Route;

Route::post('/register', [\App\Http\Controllers\AuthController::class, "register"]);

Route::post('/login', [\App\Http\Controllers\AuthController::class, "login"]);
