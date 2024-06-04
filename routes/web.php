<?php

use App\Http\Controllers\Admin\AdminCandidateController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminPositionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\VoteController;

// Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
//     // Route::resource('positions', PositionController::class);
//     Route::resource('candidates', CandidateController::class);
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/vote', [VoteController::class, 'index'])->name('vote.index');
    Route::post('/vote', [VoteController::class, 'store'])->name('vote.store');
});

Route::get('/', function () {
    return view('Welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('index');
    Route::resource('positions', AdminPositionController::class);
    Route::resource('candidates', AdminCandidateController::class);
});

require __DIR__ . '/auth.php';
