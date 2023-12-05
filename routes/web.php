<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\SettingController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Player\PlayerController;
use App\Http\Controllers\Sortear\SortearController;
use App\Http\Controllers\SortearSortearController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login.index');
});

Route::prefix('login')->name('login.')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('index');
    Route::post('/store', [AuthController::class, 'store'])->name('store');
    Route::delete('/logout', [AuthController::class, 'delete'])->name('delete');
});

Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/show/{id}', [UserController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('delete');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');

        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/', [SettingController::class, 'index'])->name('index');
            Route::put('/', [SettingController::class, 'update'])->name('update');
        });
    });

    Route::prefix('player')->name('player.')->group(function () {
        Route::get('/', [PlayerController::class, 'index'])->name('index');
        Route::get('/show/{id}', [PlayerController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [PlayerController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [PlayerController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [PlayerController::class, 'delete'])->name('delete');
        Route::get('/create', [PlayerController::class, 'create'])->name('create');
        Route::post('/store', [PlayerController::class, 'store'])->name('store');
    });
    
    Route::prefix('sortear')->name('sortear.')->group(function () {      
        Route::post('/store', [SortearController::class, 'sortear'])->name('sortear');
    });
});
