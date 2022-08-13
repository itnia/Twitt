<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SubscriptionsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageSubscription;
use App\Http\Controllers\MessageComment;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

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

Route::redirect('/', '/home');
Route::view('/login', 'layouts.login')->name('login');
Route::post('/login', [AuthController::class, 'auth'])->name('login.auth');
Route::delete('/login', [AuthController::class, 'destroy']);
Route::view('/registration', 'layouts.reg')->name('registration');
Route::post('/registration', [AuthController::class, 'reg'])->name('registration.store');

Route::middleware('auth', 'layout')->group(function () {
    //Messages
    Route::apiResource('/messages', MessageController::class);
    Route::post('/messages/like/{id}', [MessageController::class, 'like']);
    
    // Subscriptions
    Route::post('/subscriptions', [SubscriptionsController::class, 'store']);
    Route::delete('/subscriptions', [SubscriptionsController::class, 'destroy']);

    // Themes #
    Route::get('/themes', function () {
        return 'themes';
    });

    // Search
    Route::post('/search', function (Request $request) {
        return $request->search;
    });

    // NavigationFilling
    Route::get('/message_subscription', MessageSubscription::class);
    Route::get('/{id}/message_comment', MessageComment::class);
    Route::get('/{user}/twits', [UserController::class, 'twits']);
    Route::get('/{user}/with_replies', [UserController::class, 'with_replies']);
    Route::get('/{user}/media', [UserController::class, 'media']);
    Route::get('/{user}/likes', [UserController::class, 'likes']);

    // Navigation
    Route::view('/home', 'home')->name('home');
    Route::view('/correspondence', 'correspondence');
    Route::get('/subscriptions', [SubscriptionsController::class, 'index'])->name('subscriptions');
    Route::get('/{user}/status/{id}', [MessageController::class, 'show']);
    Route::get('/{user}', [UserController::class, 'index']);
});