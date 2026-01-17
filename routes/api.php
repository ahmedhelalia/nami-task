<?php

use App\Http\Controllers\Api\Auth\Admin\AdminLoginController;
use App\Http\Controllers\Api\Auth\User\UserLoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:admins');

Route::post('/admin/login', AdminLoginController::class);
Route::post('/user/login', UserLoginController::class);
