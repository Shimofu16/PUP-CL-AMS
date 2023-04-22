<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UsersController;
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
    Route::post('/logout', [HomeController::class, 'logout'])->name('logout.delete')->middleware('auth');
});
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');

/* COMPUTER */
    Route::prefix('computer')->name('computer.')->controller(ComputerController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::delete('/destroy', 'destroy')->name('destroy');
        Route::put('/update', 'update')->name('update');
    });

    /* SCHEDULE */
    Route::prefix('schedule')->name('schedule.')->controller(ScheduleController::class)->group(function () {
        Route::get('/', 'index')->name('index');

    });

    /* FACULTY */
    Route::prefix('faculty')->name('faculty.')->controller(FacultyController::class)->group(function () {
        Route::get('/', 'index')->name('index');

    });

    /* STUDENT */
    Route::prefix('student')->name('student.')->controller(StudentController::class)->group(function () {
        Route::get('/', 'index')->name('index');

    });


});
