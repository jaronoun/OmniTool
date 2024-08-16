<?php

use App\Filament\Pages\Register;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('schedules')->group(function () {
    Route::get('/', function () {
        return view('schedule');
    })->name('schedules');

    Route::get('{scheduleId}', function () {
        return view('schedule');
    })->name('schedule.show');

    Route::get('{scheduleId}/{trainingId}', function () {
        return view('schedule');
    })->name('training.show');

    Route::get('{scheduleId}/{trainingId}/{usexId}', function () {
        return view('schedule');
    })->name('usex.show');
});

Route::get('/register', Register::class)->name('register');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
