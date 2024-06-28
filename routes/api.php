<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/register', [AuthController::class, 'register']);
Route::middleware('auth:api')->group(function () {
    Route::get('user', [UserController::class, 'show']);
    Route::put('user', [UserController::class, 'update']);
    Route::delete('user', [UserController::class, 'destroy']);
    Route::post('user/permissions', [UserController::class, 'addPermission']);
    Route::post('user/address', [UserController::class, 'addAddress']);
});
