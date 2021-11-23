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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/publish/{topic}",[PublishMessageController::class,'publishMessage']);
Route::post("/subscribe/{topic}",[ConsumeMessageController::class,'consumeMessage']);
Route::post("/test1",[SubscriberController::class,'test1']);
Route::post("/test2",[SubscriberController::class,'test2']);
