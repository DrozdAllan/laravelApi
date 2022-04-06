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
Route::get('/user', ['App\Http\Controllers\UserController', 'getUser'])
     ->middleware('auth:sanctum');
Route::apiResource('movies', \App\Http\Controllers\MovieController::class)
     ->only(['index', 'show']);
Route::apiResource('movies', \App\Http\Controllers\MovieController::class)
     ->except(['index', 'show'])
     ->middleware('auth:sanctum');

Route::post('/tokens/create', ['App\Http\Controllers\TokenController', 'create'])
     ->middleware('auth:sanctum');