<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| User Frontend Routes (Default URL)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('user.pages.index', ['title' => 'Home']);
})->name('user.index');

Route::get('/shop', function () {
    return view('user.pages.shop', ['title' => 'Shop']);
})->name('user.shop');

Route::get('/product-detail/{slug?}', function ($slug = null) {
    return view('user.pages.product-detail', ['title' => 'Product Detail', 'slug' => $slug]);
})->name('user.product-detail');

Route::get('/about', function () {
    return view('user.pages.about', ['title' => 'About Us']);
})->name('user.about');

Route::get('/contact', function () {
    return view('user.pages.contact', ['title' => 'Contact']);
})->name('user.contact');

Route::post('/contact', function () {
    // Handle contact form submission
    return redirect()->route('user.contact')->with('success', 'Message sent successfully!');
})->name('user.contact.submit');

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
