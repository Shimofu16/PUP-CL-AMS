<?php

use App\Http\Controllers\AccountSettings\ChangePasswordController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AttendanceLogController;
use App\Http\Controllers\Admin\ComputerController;
use App\Http\Controllers\Admin\ComputerStatusLogController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\FacultyMemberController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\ScheduleRequestController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\UserLogController;
use App\Http\Controllers\Faculty\ComputerStatusLogController as FacultyComputerStatusLogController;
use App\Http\Controllers\Faculty\CourseController  as FacultyCourseController;
use App\Http\Controllers\Faculty\DashboardController as FacultyDashboardController;
use App\Http\Controllers\Faculty\SubjectController as FacultySubjectController;
use App\Http\Controllers\Faculty\FacultyController as FacultyFacultyMemberController;
use App\Http\Controllers\Faculty\ScheduleController as FacultyScheduleController;
use App\Http\Controllers\Faculty\SectionController as FacultySectionController;
use App\Http\Controllers\Faculty\StudentController as FacultyStudentController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Student\AttendanceController as StudentAttendanceController;
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

Route::middleware('alert')->controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home.index');
    Route::get('/register', 'registrationForm')->name('register.index');
    Route::post('/register/student', 'register')->name('register.store');
    Route::get('/login', 'loginForm')->name('login.index');
    Route::post('/login', 'login')->name('login.store');
    Route::post('/logout',  'logout')->name('logout.delete')->middleware('auth');
});

Route::middleware(['auth', 'alert', 'checkStatus', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('academics')->name('academic.')->group(function () {

        /* COURSE */
        Route::prefix('course')->name('course.')->controller(CourseController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}', 'show')->name('show');
            Route::post('/store', 'store')->name('store');
            Route::put('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });
        /* SCHEDULE */
        Route::prefix('schedule')->name('schedule.')->controller(ScheduleController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}', 'show')->name('show');
            Route::post('/store/{id}', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });

        /* SECTION */
        Route::prefix('section')->name('section.')->controller(SectionController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}', 'show')->name('show');
            Route::post('/store', 'store')->name('store');
            Route::put('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });
        /* SUBJECT */
        Route::prefix('subject')->name('subject.')->controller(SubjectController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}', 'show')->name('show');
            Route::post('/store', 'store')->name('store');
            Route::put('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });
    });

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
            Route::get('/charts', 'charts')->name('charts');
            Route::get('/{id?}/{date_id?}', 'show')->name('show');
            Route::post('/store', 'store')->name('store');
            Route::put('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });
        /* COMPUTER LOG */
        Route::prefix('computer')->name('computer.')->controller(ComputerStatusLogController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/charts', 'charts')->name('charts');
            Route::get('/{id}', 'show')->name('show');
            Route::post('/store', 'store')->name('store');
            Route::put('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });

        /* SCHEDULE REQUEST  */
        Route::prefix('schedule/request')->name('schedule.request.')->controller(ScheduleRequestController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{status}', 'show')->name('show');
            Route::post('/store', 'store')->name('store');
            Route::put('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/{status}/update', 'update')->name('update');
            Route::delete('/{id}/{status}/destroy', 'destroy')->name('destroy');
        });
    });



    /* SUBJECT */
    Route::prefix('subject')->name('subject.')->controller(SubjectController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/store', 'store')->name('store');
        Route::put('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });

    /* USERS */
    Route::prefix('user')->name('user.')->group(function () {
        Route::prefix('information')->name('information.')->group(function () {
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
                Route::get('/{section_id?}', 'index')->name('index');
                Route::get('/{id}', 'show')->name('show');
                Route::post('/store', 'store')->name('store');
                Route::put('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}/update', 'update')->name('update');
                Route::delete('/{id}/destroy', 'destroy')->name('destroy');
            });
        });
        Route::prefix('account')->name('account.')->group(function () {
            /* FACULTY */
            Route::prefix('faculty')->name('faculty.')->controller(FacultyMemberController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/{id}', 'show')->name('show');
                Route::post('/store', 'store')->name('store');
                Route::put('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}/update', 'update')->name('update');
                Route::put('/{id}/reset/password', 'resetPassword')->name('resetPassword');
                Route::get('/reset/all/password', 'resetAllPassword')->name('resetAllPassword');
                Route::delete('/{id}/destroy', 'destroy')->name('destroy');
            });
            Route::prefix('log')->name('log.')->controller(UserLogController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/{id}', 'show')->name('show');
                Route::post('/store', 'store')->name('store');
                Route::put('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}/update', 'update')->name('update');
                Route::delete('/{id}/destroy', 'destroy')->name('destroy');
            });

            /* STUDENT */
            Route::prefix('student')->name('student.')->controller(StudentController::class)->group(function () {
                Route::get('/{section_id?}', 'index')->name('index');
                Route::get('/{id}', 'show')->name('show');
                Route::post('/store', 'store')->name('store');
                Route::put('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}/update', 'update')->name('update');
                Route::put('/{id}/reset/password', 'resetPassword')->name('resetPassword');
                Route::get('/reset/all/password', 'resetAllPassword')->name('resetAllPassword');
                Route::delete('/{id}/destroy', 'destroy')->name('destroy');
            });
        });
    });
    Route::prefix('change-password')->name('change-password.')->group(function () {
        Route::get('/', [ChangePasswordController::class, 'index'])->name('index');
        Route::put('/update', [ChangePasswordController::class, 'update'])->name('update');
    });
});


Route::middleware(['auth', 'alert', 'checkStatus', 'isFaculty'])->prefix('faculty')->name('faculty.')->group(function () {
    Route::get('/dashboard/{filter?}', [FacultyDashboardController::class, 'index'])->name('dashboard.index');
    Route::prefix('academics')->name('academic.')->group(function () {

        /* COURSE */
        Route::prefix('course')->name('course.')->controller(FacultyCourseController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}', 'show')->name('show');
            Route::post('/store', 'store')->name('store');
            Route::put('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });
        /* SECTION */
        Route::prefix('section')->name('section.')->controller(FacultySectionController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}', 'show')->name('show');
            Route::post('/store', 'store')->name('store');
            Route::put('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });

        /* SUBJECT */
        Route::prefix('subject')->name('subject.')->controller(FacultySubjectController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}', 'show')->name('show');
            Route::post('/store', 'store')->name('store');
            Route::put('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        });
    });
    /* Computer status log */
    Route::prefix('computer')->name('computer.')->controller(FacultyComputerStatusLogController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/store', 'store')->name('store');
        Route::put('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });
    /* FACULTY */
    Route::prefix('faculty')->name('faculty.')->controller(FacultyFacultyMemberController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/store', 'store')->name('store');
        Route::put('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });
    /* SCHEDULE */
    Route::prefix('schedule')->name('schedule.')->controller(FacultyScheduleController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id?}/{date_id?}', 'show')->name('show');
        Route::post('/store', 'store')->name('store');
        Route::post('/reschedule', 'reschedule')->name('reschedule');
        Route::put('/{id}/edit', 'edit')->name('edit');
        Route::put('/{type}/{id}/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });

    /* STUDENT */
    Route::prefix('student')->name('student.')->controller(FacultyStudentController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/store', 'store')->name('store');
        Route::put('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });
    Route::prefix('change-password')->name('change-password.')->group(function () {
        Route::get('/', [ChangePasswordController::class, 'index'])->name('index');
        Route::put('/update', [ChangePasswordController::class, 'update'])->name('update');
    });
});
Route::middleware(['auth', 'alert', 'checkStatus', 'isStudent'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard/{filter?}', [StudentDashboardController::class, 'index'])->name('dashboard.index');

    /* ATTENDANCE */
    Route::prefix('attendance')->name('attendance.')->controller(StudentAttendanceController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::put('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });
    Route::prefix('change-password')->name('change-password.')->group(function () {
        Route::get('/', [ChangePasswordController::class, 'index'])->name('index');
        Route::put('/update', [ChangePasswordController::class, 'update'])->name('update');
    });
});
