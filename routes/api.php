<?php

use App\Http\Controllers\API\LokasiController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('register/check', [RegisteredUserController::class, 'check'])->name('register-check');
Route::get('api-province', [LokasiController::class, 'province'])->name('api-province');
Route::get('api/regencies/{province_id}', [LokasiController::class, 'regency'])->name('api/regencies');
