<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\HomeController;
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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home.index');
    Route::get('/register', 'registrationForm')->name('register.index');
    Route::post('/register', 'register')->name('register.store');
    Route::get('/login', 'loginForm')->name('login.index');
    Route::post('/login', 'login')->name('login.store');
    Route::post('/logout', [HomeController::class,'logout'])->name('logout.delete')->middleware('auth');
});
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');
});
