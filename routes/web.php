<?php

use App\Http\Controllers\contactFormController;
use App\Http\Controllers\frontMainPageController;
use App\Http\Controllers\frontPageController;
use App\Http\Controllers\portfolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\serviceController;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('admin')->group(function(){
    Route::get('/', [frontPageController::class,'index'])->name('front.page');
    Route::get('/dashboard', [frontPageController::class,'dashboard'])->name('dashboard.page');
    Route::get('/main', [frontMainPageController::class,'index'])->name('main.page');
    Route::put('/main', [frontMainPageController::class,'update'])->name('admin.main.update');


    Route::get('/service/create', [serviceController::class,'create'])->name('admin.service.create'); //this create is a page
    Route::post('/service/store', [serviceController::class,'store'])->name('admin.service.create.all');
    Route::get('/service/list', [serviceController::class,'list'])->name('admin.service.list');
    Route::get('/service/edit/{id}', [serviceController::class,'edit'])->name('admin.service.edit');
    Route::post('/service/update/{id}', [serviceController::class,'update'])->name('admin.service.update');
    Route::delete('/service/destroy/{id}', [serviceController::class,'destroy'])->name('admin.service.destroy');

    Route::get('/portfolio/create', [portfolioController::class,'create'])->name('admin.portfolio.create');
    Route::post('/portfolio/store', [portfolioController::class,'store'])->name('admin.portfolio.create.all');
    Route::get('/portfolio/list', [portfolioController::class,'list'])->name('admin.portfolio.list');
    Route::get('/portfolio/edit/{id}', [portfolioController::class,'edit'])->name('admin.portfolio.edit');
    Route::put('/portfolio/update/{id}', [portfolioController::class,'update'])->name('admin.portfolio.update');
    Route::delete('/portfolio/destroy/{id}', [portfolioController::class,'destroy'])->name('admin.portfolio.destroy');



});

    Route::post('contact/store',[contactFormController::class,'store'])->name('contact.store');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
