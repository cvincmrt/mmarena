<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;



Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::view('/services/create', 'services.create')->name('services.create');

Route::post('/services', [ServiceController::class, 'store'])
    ->middleware('local.only')
    ->name('services.store');
