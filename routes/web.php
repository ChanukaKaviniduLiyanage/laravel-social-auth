<?php

use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\TasksController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('/dashboard', [GoogleController::class, 'dashboard'])->name('dashboard');

// Google OAuth & dashboard routes already added above

Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');
Route::get('/email', [EmailController::class, 'index'])->name('email');
Route::get('/todos', [TasksController::class, 'index'])->name('todos');

Route::get('/logout', [GoogleController::class, 'logout'])->name('logout');
