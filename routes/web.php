<?php

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

Route::get('/', [\App\Http\Controllers\CheckInnRealtimeController::class, 'form'])->name('form.base');
Route::post('/check', [\App\Http\Controllers\CheckInnRealtimeController::class, 'check'])->name('check');

Route::get('/async', \App\Http\Controllers\CheckInnAsyncController::class)->name('form.async');

