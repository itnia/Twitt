<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SubscriptionsController;
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
use App\Http\Controllers\AuthController;

Route::view('/login', 'layouts.login')->name('login');
Route::post('/login', [AuthController::class, 'auth'])->name('login.auth');
Route::delete('/login', [AuthController::class, 'destroy']);

Route::view('/registration', 'layouts.reg')->name('registration');
Route::post('/registration', [AuthController::class, 'reg'])->name('registration.store');

Route::middleware('auth')->group(function () {
    //
    Route::get('/', function () {
        return view('home', ['messages' => Message::all()]);
    })->name('home');
    Route::view('/explore', 'explore');
    Route::view('/notifications', 'notifications');
    Route::view('/correspondence', 'correspondence');
    Route::view('/bookmarks', 'bookmarks');

    Route::get('/subscriptions', [SubscriptionsController::class, 'index']);



    Route::view('/{user}/lists', 'lists')->name('lists');
    Route::view('/{user}', 'profile')->name('profile');

    Route::apiResource('/messages', MessageController::class);
});