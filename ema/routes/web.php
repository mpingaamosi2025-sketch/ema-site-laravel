<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\PageController;
use App\Http\Middleware\EnsureAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/index.html', [PageController::class, 'index']);

Route::get('/login', [PageController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/forgotpassword', [PageController::class, 'forgotPassword'])->name('forgotpassword');
Route::post('/forgotpassword', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

Route::middleware([EnsureAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/pages', [AdminPageController::class, 'index'])->name('pages.index');
    Route::get('/pages/{page}/edit', [AdminPageController::class, 'edit'])->name('pages.edit');
    Route::get('/pages/{page}/visual', [AdminPageController::class, 'visual'])->name('pages.visual');
    Route::put('/pages/{page}', [AdminPageController::class, 'update'])->name('pages.update');
    Route::post('/pages/{page}/visual', [AdminPageController::class, 'updateVisual'])->name('pages.visual.update');
    Route::post('/settings', [DashboardController::class, 'updateSettings'])->name('settings.update');
    Route::post('/messages/{clientMessage}/reply', [DashboardController::class, 'replyToMessage'])->name('messages.reply');
    Route::delete('/messages/{clientMessage}', [DashboardController::class, 'deleteMessage'])->name('messages.delete');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('/profile', [DashboardController::class, 'updateProfile'])->name('profile.update');
    Route::get('/change-password', [DashboardController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [DashboardController::class, 'updatePassword'])->name('password.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('services', ServiceController::class)->names('services');
});
