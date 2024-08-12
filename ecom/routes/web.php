<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;

Route::resource('permissions', PermissionController::class);
Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);
// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('index');
// Product Routes
// Route::get('/product/{product}', [HomeController::class, 'product'])->name('home.product');
Route::get('/products', [HomeController::class, 'product'])->name('product');

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'check_login']);

Route::get('/admin/register', [AdminController::class, 'register'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'check_register']);




// Admin Routes with Authentication Middleware and Prefix
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resources([
        'category' => CategoryController::class,
        'product' => ProductController::class,

    ]);
});
