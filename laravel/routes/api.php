<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatAppController;

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
Route::get('/test',function(){
    return "hehehello";
});
Route::apiResource('tasks', TaskController::class);
Route::apiresource('user', UserController::class);
Route::apiresource('tickets', TicketsController::class);
Route::apiresource('comment', TicketsController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/infouser',[AuthController::class,'infouser'])->middleware('auth:sanctum');
Route::apiResource('ChatApp' , ChatAppController::class );