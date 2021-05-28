<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SellerRequestController;
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

Route::middleware('guest')->group(function () {
    Route::get('register', function () {
        return view('register');
    })->name('register');
    Route::post('register', [AuthController::class, 'register']);

    Route::get('login', function () {
        return view('login');
    })->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');
    Route::resource('/requests', SellerRequestController::class)->only(['store', 'update', 'index',])
        ->parameters([
            'requests' => 'sellerRequest'
        ]);
});
