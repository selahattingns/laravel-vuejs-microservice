<?php

use Illuminate\Support\Facades\Route;

Route::post('/register', [\App\Http\Controllers\AuthController::class, "register"]);

Route::post('/login', [\App\Http\Controllers\AuthController::class, "login"]);

Route::post('/tokenCheck', [\App\Http\Controllers\AuthController::class, 'tokenCheck']);
