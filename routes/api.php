<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthJWTController;
use App\Http\Controllers\TaskController;

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
    Route::post('reg', [AuthJWTController::class, 'reg']);
    
});

Route::middleware(['jwt.auth'])->group(function () {
    // Route::post('/posts', [PostController::class, 'store']);
    // Route::get('/posts/{post}', [PostController::class, 'show']);
    // Route::patch('/posts/{post}', [PostController::class, 'update']);
    // Route::delete('/posts/{post}', [PostController::class, 'destroy']);
    
    Route::post('test', function() {
        return "okey";
    });

    Route::post('/task', [TaskController::class, 'index']);
    Route::post('/task/store', [TaskController::class, 'store']);
    Route::patch('/task/{task}', [TaskController::class, 'update']);
    Route::delete('/task/{task}', [TaskController::class, 'destroy']);

});


Route::get('/test', function () {
    return 'okey test';
});



// Route::get('/', function () {
//     return response()->json([
//         'name' => 'Abigail',
//         'state' => 'CA',
//     ]);
// });