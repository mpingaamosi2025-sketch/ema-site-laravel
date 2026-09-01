<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/index.html', [PageController::class, 'index']);

Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/services.html', [PageController::class, 'services']);

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/about.html', [PageController::class, 'about']);

Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/contact.html', [PageController::class, 'contact']);

Route::get('/service-details', [PageController::class, 'serviceDetails'])->name('service-details');
Route::get('/service-details.html', [PageController::class, 'serviceDetails']);

Route::get('/starter-page', [PageController::class, 'starterPage'])->name('starter-page');
Route::get('/starter-page.html', [PageController::class, 'starterPage']);

Route::post('/forms/contact.php', [PageController::class, 'contactForm']);
Route::post('/forms/newsletter.php', [PageController::class, 'newsletterForm']);
