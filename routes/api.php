<?php

use Illuminate\Http\JsonResponse;
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
Route::get('/user', ['App\Http\Controllers\UserController', 'getUser'])->middleware('auth:sanctum');
//Route::apiResource('movies', \App\Http\Controllers\MovieController::class)->middleware('auth:sanctum');
//Route::apiResource('movies', \App\Http\Controllers\MovieController::class)->middleware('ability:translate');
Route::get('/movies', [\App\Http\Controllers\MovieController::class, 'index'])->middleware('ability:translate');
//Route::apiResource('movies', \App\Http\Controllers\MovieController::class);

//['auth:sanctum',
Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken("client_token", ['translate']);
    return ['token' => $token->plainTextToken];
});

Route::post('/tokens/test', function (Request $request) {
    //    $token = $request['token'];
    return new JsonResponse($request->user()->tokenCan('translate-movie'));
});