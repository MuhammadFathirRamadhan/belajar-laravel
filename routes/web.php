<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;

Route::get('/', function() {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/store', [AttendanceController::class, 'store'])->name('store');
Route::get('/edit/{id}', [AttendanceController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [AttendanceController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [AttendanceController::class, 'destroy'])->name('delete');
