<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Route::middleware('auth')
    ->get('/', function () {
        return view('home');
    })->name('home');

Route::controller(AuthController::class)
    ->group(function () {
        Route::get('login', 'index')->name('login');
        Route::post('login', 'login');
        Route::post('logout', 'logout')->name('logout');
    });
