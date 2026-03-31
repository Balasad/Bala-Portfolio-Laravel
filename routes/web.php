<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Portfolio Routes
|--------------------------------------------------------------------------
*/

// ── Home page — loads tools + experiences from DB
Route::get('/', [HomeController::class, 'index'])->name('home');

// ── Contact form — saves message to DB + sends email notification
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// ── Analytics — called silently from frontend JS
// Tracks: page_view, cv_download, tool_click, contact_sent
Route::post('/analytics/event', [AnalyticsController::class, 'store'])->name('analytics.store');