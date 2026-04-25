<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\KnowledgeCenterController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/edukasi', [KnowledgeCenterController::class, 'education'])->name('education');
Route::get('/panduan-layanan', [KnowledgeCenterController::class, 'serviceGuide'])->name('service-guide');

// Login & Register routes (tanpa auth)
require __DIR__.'/auth.php';

// Dashboard - dipisah berdasarkan role
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('reports', ReportController::class);

    Route::middleware('can:manage-admins')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [AdminUserController::class, 'create'])->name('users.create');
        Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');
    });
});
