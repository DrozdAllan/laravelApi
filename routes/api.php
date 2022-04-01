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
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Route::apiResource('movies', \App\Http\Controllers\MovieController::class)->middleware('auth:sanctum');
//Route::apiResource('movies', \App\Http\Controllers\MovieController::class)->middleware('ability:translate');
Route::get('/movies', [\App\Http\Controllers\MovieController::class, 'index'])->middleware('ability:translate');
//Route::apiResource('movies', \App\Http\Controllers\MovieController::class);


//['auth:sanctum',
Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken("client_token", ['translate']);
    return ['token' => $token->plainTextToken];
});