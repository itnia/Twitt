<?php

use Illuminate\Support\Facades\Route;

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


use App\Http\Controllers\MessageController;

Route::middleware('auth')->group(function () {
    //
    Route::get('/', function () {
        return view('home', ['jobs' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]]);
    })->name('home');

    Route::apiResource('/messages', MessageController::class);
});