<?php

use App\Http\Controllers\frontMainPageController;
use App\Http\Controllers\frontPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\serviceController;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [frontPageController::class,'index'])->name('front.page');
Route::get('/admin/dashboard', [frontPageController::class,'dashboard'])->name('dashboard.page');
Route::get('/admin/main', [frontMainPageController::class,'index'])->name('main.page');
Route::put('admin/main', [frontMainPageController::class,'update'])->name('admin.main.update');
Route::get('admin/service/create', [serviceController::class,'create'])->name('admin.service.create'); //this create is a page
Route::post('admin/service/store', [serviceController::class,'store'])->name('admin.service.create.all');
Route::get('admin/service/list', [serviceController::class,'list'])->name('admin.service.list');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
