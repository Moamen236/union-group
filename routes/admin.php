<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| All admin routes are prefixed with /admin and require authentication.
| Role and permission middleware are applied to protect each resource.
|
*/

// Language Switcher (accessible without auth for flexibility)
Route::get('/set-locale/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return redirect()->back();
})->name('admin.set-locale');

Route::middleware(['auth', 'check.active'])->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Sliders
    Route::middleware(['permission:manage sliders'])->group(function () {
        Route::resource('sliders', SliderController::class)->names('admin.sliders');
        Route::post('sliders/{slider}/toggle-status', [SliderController::class, 'toggleStatus'])->name('admin.sliders.toggle-status');
        Route::post('sliders/update-order', [SliderController::class, 'updateOrder'])->name('admin.sliders.update-order');
    });

    // Product Categories
    Route::middleware(['permission:manage product categories'])->group(function () {
        Route::resource('product-categories', ProductCategoryController::class)->names('admin.product-categories');
        Route::post('product-categories/{product_category}/toggle-status', [ProductCategoryController::class, 'toggleStatus'])->name('admin.product-categories.toggle-status');
    });

    // Products (with integrated colors and images management)
    Route::middleware(['permission:manage products'])->group(function () {
        Route::resource('products', ProductController::class)->names('admin.products');
        Route::post('products/{product}/toggle-status', [ProductController::class, 'toggleStatus'])->name('admin.products.toggle-status');
        Route::post('products/{product}/toggle-favorite', [ProductController::class, 'toggleFavorite'])->name('admin.products.toggle-favorite');

        // Product Colors (Step 2)
        Route::get('products/{product}/colors', [ProductController::class, 'colors'])->name('admin.products.colors');
        Route::post('products/{product}/colors', [ProductController::class, 'storeColor'])->name('admin.products.colors.store');
        Route::delete('products/{product}/colors/{color}', [ProductController::class, 'destroyColor'])->name('admin.products.colors.destroy');

        // Product Images (Step 3)
        Route::get('products/{product}/images', [ProductController::class, 'images'])->name('admin.products.images');
        Route::post('products/{product}/images', [ProductController::class, 'storeImage'])->name('admin.products.images.store');
        Route::delete('products/{product}/images/{image}', [ProductController::class, 'destroyImage'])->name('admin.products.images.destroy');
        Route::post('products/{product}/images/{image}/set-main', [ProductController::class, 'setMainImage'])->name('admin.products.images.set-main');
    });

    // Legacy Product Colors (standalone - keeping for backward compatibility)
    Route::middleware(['permission:manage product colors'])->group(function () {
        Route::resource('product-colors', ProductColorController::class)->names('admin.product-colors');
        Route::post('product-colors/{product_color}/toggle-status', [ProductColorController::class, 'toggleStatus'])->name('admin.product-colors.toggle-status');
    });

    // Legacy Product Images (standalone - keeping for backward compatibility)
    Route::middleware(['permission:manage product images'])->group(function () {
        Route::resource('product-images', ProductImageController::class)->names('admin.product-images');
        Route::post('product-images/{product_image}/set-main', [ProductImageController::class, 'setMain'])->name('admin.product-images.set-main');
        Route::post('product-images/update-order', [ProductImageController::class, 'updateOrder'])->name('admin.product-images.update-order');
        Route::get('api/products/{product}/colors', [ProductImageController::class, 'getColors'])->name('admin.api.products.colors');
    });

    // Projects
    Route::middleware(['permission:manage projects'])->group(function () {
        Route::resource('projects', ProjectController::class)->names('admin.projects');
        Route::post('projects/{project}/toggle-status', [ProjectController::class, 'toggleStatus'])->name('admin.projects.toggle-status');
    });

    // Certificates
    Route::middleware(['permission:manage certificates'])->group(function () {
        Route::resource('certificates', CertificateController::class)->names('admin.certificates');
        Route::post('certificates/{certificate}/toggle-status', [CertificateController::class, 'toggleStatus'])->name('admin.certificates.toggle-status');
    });

    // Users
    Route::middleware(['permission:manage users'])->group(function () {
        Route::resource('users', UserController::class)->names('admin.users');
        Route::post('users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('admin.users.toggle-status');
    });
});
