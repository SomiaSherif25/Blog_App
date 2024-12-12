<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\TagController;
use App\Jobs\LogApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('tags', TagController::class);
    Route::apiResource('posts',PostController::class);
    Route::get('/stats',[StatsController::class,'index']);
});

Route::get('/dispatch-job', function () {
    LogApiResponse::dispatch();
    return response()->json(['message' => 'Job dispatched!']);
});
