<?php

use App\Http\Controllers\frontMainPageController;
use App\Http\Controllers\frontPageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [frontPageController::class,'index'])->name('front.page');
Route::get('/admin/dashboard', [frontPageController::class,'dashboard'])->name('dashboard.page');
Route::get('/admin/main', [frontMainPageController::class,'index'])->name('main.page');
Route::put('admin/main', [frontMainPageController::class,'update'])->name('admin.main.update');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
