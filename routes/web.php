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

Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

//admin
Route::get('/admin/services', [ServiceController::class, 'adminIndex'])
    ->middleware('local.only')
    ->name('admin.services.index');

Route::get('/admin/services/{service}/edit', [ServiceController::class, 'edit'])
    ->middleware('local.only')
    ->name('admin.services.edit');

Route::patch('/admin/services/{service}', [ServiceController::class, 'update'])
    ->middleware('local.only')
    ->name('admin.services.update');

Route::delete('/admin/services/{service}', [ServiceController::class, 'destroy'])
    ->middleware('local.only')
    ->name('admin.services.delete');

Route::patch('/admin/services/{service}/status', [ServiceController::class, 'changeStatus'])
->middleware('local.only')
->name('admin.services.changeStatus');
