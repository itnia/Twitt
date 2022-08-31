<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthJWTController;

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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthJWTController::class, 'login']);
    Route::post('logout', [AuthJWTController::class, 'logout']);
    Route::post('refresh', [AuthJWTController::class, 'refresh']);
    Route::post('me', [AuthJWTController::class, 'me']);

});

Route::middleware(['jwt.auth'])->group(function () {

    Route::store('/posts', [PostController::class, 'store']);
    Route::show('/posts/{post}', [PostController::class, 'show']);
    Route::patch('/posts/{post}', [PostController::class, 'update']);
    Route::delete('/posts/{post}', [PostController::class, 'destroy']);

});