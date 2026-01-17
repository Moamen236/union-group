<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| User Frontend Routes (Default URL)
|--------------------------------------------------------------------------
*/

Route::controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('user.index');
    Route::get('/shop', 'shop')->name('user.shop');
    Route::get('/product/{slug}', 'productDetail')->name('user.product-detail');
    Route::get('/projects', 'projects')->name('user.projects');
    Route::get('/certificates', 'certificates')->name('user.certificates');
    Route::get('/about', 'about')->name('user.about');
    Route::get('/contact', 'contact')->name('user.contact');
    Route::post('/contact', 'contactSubmit')->name('user.contact.submit');
});

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes (Under /admin prefix, no registration)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    // Login routes (guest only)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [LoginController::class, 'login']);
    });

    // Logout route (auth only)
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
});
