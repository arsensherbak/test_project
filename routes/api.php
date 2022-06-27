<?php

use App\Http\Controllers\Person\IndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace' => 'App\Http\Controllers\Person','middleware'=>'auth:sanctum'], function(){
    Route::post('/', StoreController::class);
    Route::get('/{person}', ShowController::class);
});
Route::get('/', IndexController::class);
