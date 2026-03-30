<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/* ── Home ── */
Route::get('/', [HomeController::class, 'index'])->name('home');

/* ── Portfolio ── */
Route::get('/portfolio', fn () => view('pages.portfolio'))->name('portfolio');

/* ── Contact (POST) ── */
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/* ── Analytics (POST) ── */
Route::post('/analytics/event', [AnalyticsController::class, 'store'])->name('analytics.event');