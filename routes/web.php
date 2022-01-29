<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Service Routes
Route::get('/service/list', [App\Http\Controllers\Service\ServiceController::class, 'index'])->name('service.list');
Route::get('/service/list/create', [App\Http\Controllers\Service\ServiceController::class, 'createService'])->name('service.list.create');
Route::post('/service/list/store', [App\Http\Controllers\Service\ServiceController::class, 'storeService'])->name('service.list.store');
Route::get('/service/create/view', [App\Http\Controllers\Service\ServiceController::class, 'typeCreateview'])->name('service.create.view');
Route::post('/service/type/store', [App\Http\Controllers\Service\ServiceController::class, 'storeType'])->name('type.store');
Route::get('/service/type/{id}',   [App\Http\Controllers\Service\ServiceController::class, 'specificService'])->name('type.list');
Route::get('/service/detail/{id}', [App\Http\Controllers\Service\ServiceController::class, 'serviceDetails'])->name('service.detail');


