<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(IndexController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show', 'show')->name('show');
    });
    Route::prefix('/listing')->group(function () {
        Route::controller(ListingController::class)->group(function () {
            Route::get('/', 'index')
                ->name('listing.index')
                ->withoutMiddleware('auth');
            Route::get('/create', 'create')
                ->name('listing.create')
                ->withoutMiddleware('auth');
            Route::post('/', 'store')
                ->name('listing.store');
            Route::get('/{listing}', 'show')
                ->withoutMiddleware('auth')
                ->name('listing.show');
            Route::get('/{listing}/edit', 'edit')
                ->name('listing.edit');
            Route::put('/{listing}', 'update')
                ->name('listing.update');
            Route::delete('/{listing}', 'destroy')
                ->name('listing.destroy');
        });
    });
});

require __DIR__.'/auth.php';
