<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/specialities', [PageController::class, 'specialities'])->name('specialities');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/revenue-cycle-management', [PageController::class, 'rcm'])->name('rcm');
Route::get('/medical-billing-consulting', [PageController::class, 'medicalBillingConsulting'])->name('medical-billing-consulting');
Route::get('/thank-you', function () { return view('thank-you'); })->name('thank-you');
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy.policy');
Route::get('/terms-of-service', [PageController::class, 'terms'])->name('terms.service');
Route::get('/sitemap.xml', [SitemapController::class, 'index']);

// Filament routes are automatically registered via AdminPanelProvider
// No need to add them here

require __DIR__.'/auth.php';
