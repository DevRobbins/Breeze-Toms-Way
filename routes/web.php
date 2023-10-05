<?php

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');    
});

Route::middleware('auth')->group(function () {
    Route::middleware('isadmin')->group(function() {
        Route::get('/profile/{id}', [ProfileController::class, 'editAdditional'])->name('profile.editadd');
        Route::patch('/profile/{id}', [ProfileController::class, 'updateAdditional'])->name('profile.updateadd');
        Route::delete('/profile/{id}', [ProfileController::class, 'destroyAdditional'])->name('profile.destroyadd');    
    }); 
});

require __DIR__.'/auth.php';
