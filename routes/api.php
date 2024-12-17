<?php

use App\Http\Controllers\Api\PresensiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::group(
//     [
//         'as' => 'api.',
//     ],
//     function () {
//         Route::get('/presensi', [PresensiController::class, 'index'])
//             ->name('presensi');
            
//         Route::post('/presensi', [PresensiController::class, 'store'])
//             ->name('presensi.store');
//     },
// );
