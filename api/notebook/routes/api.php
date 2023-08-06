<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => 'authCheck'], function (){

    Route::get('list', [\App\Http\Controllers\NoteController::class, 'getList']);
    Route::post('store', [\App\Http\Controllers\NoteController::class, 'store']);
    Route::delete('delete/{id}', [\App\Http\Controllers\NoteController::class, 'delete']);

});
