<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
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

Route::controller(UserController::class)->prefix('users')->name('users')->group(function() {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::middleware('auth:sanctum')->group(function() {
        Route::post('logout', 'logout');
    });
});

Route::controller(CourseController::class)
    ->middleware('auth:sanctum')
    ->prefix('courses')
    ->name('courses')
    ->group(function() {
        Route::post('create', 'create');
        Route::get('list', 'list');
        Route::get('show/{courseId}', 'show');
        Route::delete('delete/{courseId}', 'delete');
});