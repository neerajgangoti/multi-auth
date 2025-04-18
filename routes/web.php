<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboards
Route::middleware('auth:super_admin')->get('/super-admin/dashboard', fn() => view('dashboards.super_admin'))->name('super_admin.dashboard');
Route::middleware('auth:management')->get('/management/dashboard', fn() => view('dashboards.management'))->name('management.dashboard');
Route::middleware('auth:principal')->get('/principal/dashboard', fn() => view('dashboards.principal'))->name('principal.dashboard');
Route::middleware('auth:teacher')->get('/teacher/dashboard', fn() => view('dashboards.teacher'))->name('teacher.dashboard');
Route::middleware('auth:staff')->get('/staff/dashboard', fn() => view('dashboards.staff'))->name('staff.dashboard');
