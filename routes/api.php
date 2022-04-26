<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\User\UserController;

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

Route::prefix('role')->group(function () {
    Route::get('/get', [RoleController::class, 'get']);
});

Route::prefix('user')->group(function () {
    Route::get('/get', [UserController::class, 'get']);
    Route::post('/store', [UserController::class, 'store']);
});
