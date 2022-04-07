<?php

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
Route::middleware('auth:sanctum')
     ->group(function () {
         Route::get('/user', ['App\Http\Controllers\UserController', 'getUser']);
         Route::get('/user/token', ['App\Http\Controllers\UserController', 'getToken']);
         Route::post('/user/token', ['App\Http\Controllers\UserController', 'refreshToken']);
     });

Route::apiResource('movies', \App\Http\Controllers\MovieController::class)
     ->only(['index', 'show']);
Route::apiResource('movies', \App\Http\Controllers\MovieController::class)
     ->except(['index', 'show'])
     ->middleware('auth:sanctum');

