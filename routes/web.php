<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AttendanceLogController;
use App\Http\Controllers\Admin\ComputerController;
use App\Http\Controllers\Admin\ComputerStatusLogController;
use App\Http\Controllers\Admin\FacultyMemberController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\StudentController;
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
Route::middleware(['auth', 'Alert'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');

    /* COMPUTER */
    Route::prefix('computer')->name('computer.')->controller(ComputerController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });

    /* REPORTS */
    Route::prefix('report')->name('report.')->group(function () {

        /* ATTENDANCE LOG */
        Route::prefix('attendance')->name('attendance.')->controller(AttendanceLogController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}', 'show')->name('show');
            Route::post('/store', 'store')->name('store');
            Route::put('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });

        /* COMPUTER STATUS LOG */
        Route::prefix('computer')->name('computer.')->controller(ComputerStatusLogController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}', 'show')->name('show');
            Route::post('/store', 'store')->name('store');
            Route::put('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });
    });

    /* SCHEDULE */
    Route::prefix('schedule')->name('schedule.')->controller(ScheduleController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/store', 'store')->name('store');
        Route::put('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });

    /* USERS */
    Route::prefix('user')->name('user.')->group(function () {

        /* FACULTY */
        Route::prefix('faculty')->name('faculty.')->controller(FacultyMemberController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}', 'show')->name('show');
            Route::post('/store', 'store')->name('store');
            Route::put('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });

        /* STUDENT */
        Route::prefix('student')->name('student.')->controller(StudentController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}', 'show')->name('show');
            Route::post('/store', 'store')->name('store');
            Route::put('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });
    });
});
