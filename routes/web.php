<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/service/list', [App\Http\Controllers\HomeController::class, 'serviceIndex'])->name('service.list');
// Service Routes
Route::get('/service/type/{id}',   [App\Http\Controllers\Service\ServiceController::class, 'specificService'])->name('type.list');
Route::get('/service/detail/{id}', [App\Http\Controllers\Service\ServiceController::class, 'serviceDetails'])->name('service.detail');
// Middlewared service routes
Route::get('/service/list/create', [App\Http\Controllers\Service\ServiceController::class, 'createService'])->name('service.list.create');
Route::post('/service/list/store', [App\Http\Controllers\Service\ServiceController::class, 'storeService'])->name('service.list.store');
Route::get('/service/create/view', [App\Http\Controllers\Service\ServiceController::class, 'typeCreateview'])->name('service.create.view');
Route::post('/service/type/store', [App\Http\Controllers\Service\ServiceController::class, 'storeType'])->name('type.store');

//ServiceProvider Route middlwared
Route::get('/apply/forsp', [App\Http\Controllers\ServiceProviderController::class, 'applyForm'])->name('apply.form');
Route::post('/application/sumbit', [App\Http\Controllers\ServiceProviderController::class, 'applicationSubmit'])->name('application.submit');
Route::get('/application/list', [App\Http\Controllers\ServiceProviderController::class, 'applicationlist'])->name('application.list');
Route::post('/application/action/{provider_id}', [App\Http\Controllers\ServiceProviderController::class, 'providerApprove'])->name('application.action');

// cart
Route::get('service/cart/{id}', [App\Http\Controllers\CartController::class, 'createCart'])->name('create.cart');
Route::get('service/cart', [App\Http\Controllers\CartController::class, 'cartList'])->name('view.cart');
Route::get('cart/accept/{cart_id}', [App\Http\Controllers\CartController::class, 'cartAccept'])->name('cart.accept');
