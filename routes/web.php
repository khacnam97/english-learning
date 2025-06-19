<?php

use App\Http\Controllers\Admin\CourseManagementController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [HomeController::class, 'index']);

// Trang admin - chỉ admin mới vào được
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/courses/{id}/students', [CourseManagementController::class, 'students'])->name('admin.courses.students');
    Route::get('/courses/{id}/index', [CourseManagementController::class, 'index'])->name('admin.courses.index');
    Route::resource('lessons', LessonController::class);
});

// Trang user
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect('/admin');
        }
        return redirect('/'); // hoặc return view('home');
    })->name('dashboard');
    Route::resource('courses', CourseController::class);
    Route::post('/courses/{id}/enroll', [EnrollmentController::class, 'enroll'])->name('courses.enroll');
    Route::post('/courses/{id}/unenroll', [EnrollmentController::class, 'unenroll'])->name('courses.unenroll');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

