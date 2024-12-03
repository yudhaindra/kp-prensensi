<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Client\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(
    [
        'prefix'     => 'dashboard',
        'as'         => 'dashboard.',
        'controller' => DashboardController::class,
    ],
    function () {
        Route::get('/', 'index')
            ->name('index');

        Route::get('/give-admin', 'admin')
            ->name('admin');

        Route::post('/presensi-create', 'create')
            ->name('presensi.create');
    },
);


Route::resource('students', StudentController::class);
Route::resource('teachers',TeacherController::class);
Route::resource('roles',RoleController::class);


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');