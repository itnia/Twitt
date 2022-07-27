<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SubscriptionsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageSubscription;
use App\Http\Controllers\MessageComment;

use App\Models\Message;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/login', 'layouts.login')->name('login');
Route::post('/login', [AuthController::class, 'auth'])->name('login.auth');
Route::delete('/login', [AuthController::class, 'destroy']);
Route::view('/registration', 'layouts.reg')->name('registration');
Route::post('/registration', [AuthController::class, 'reg'])->name('registration.store');

Route::middleware('auth')->group(function () {
    // Navigation
    Route::redirect('/', '/home');
    Route::view('/home', 'home');
    Route::get('/subscriptions', [SubscriptionsController::class, 'index'])->name('subscriptions');
    Route::get('/{user}/status/{id}', [MessageController::class, 'show']);

    // NavigationFilling
    Route::get('/message_subscription', MessageSubscription::class);
    Route::get('/{id}/message_comment', MessageComment::class);

    //Messages
    Route::apiResource('/messages', MessageController::class);
    Route::post('/messages/like/{id}', [MessageController::class, 'like']);
    
    // Subscriptions
    Route::post('/subscriptions', [SubscriptionsController::class, 'store']);
    Route::delete('/subscriptions', [SubscriptionsController::class, 'destroy']);
});
