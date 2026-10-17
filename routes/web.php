<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/webhook/max', [\App\Http\Controllers\MaxController::class, 'handle']);

Route::group(['prefix' => '/'], function(){
    Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])->name('main.index');
});

Route::group(['prefix' => '/admin'], function(){
    Route::get('/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'show'])->name('admin.login');
    Route::post('/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('admin.login.post');
    Route::post('/logout', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin.main.index');

        Route::group(['prefix' => '/service'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\ServiceController::class, 'index'])->name('admin.service.index');
            Route::get('/{service}/edit/', [\App\Http\Controllers\Admin\ServiceController::class, 'edit'])->name('admin.service.edit');
            Route::put('/{service}', [\App\Http\Controllers\Admin\ServiceController::class, 'update'])->name('admin.service.update');
        });
    });
});

Route::group(['prefix' => '/order'], function(){
    Route::get('/create', [\App\Http\Controllers\OrderController::class, 'create'])->name('order.create');
    Route::post('/store', [\App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
});