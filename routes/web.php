<?php

use App\Http\Controllers\Client\DashboardController;
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
