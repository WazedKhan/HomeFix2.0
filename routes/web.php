<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Models\ServiceProvider;

Auth::routes();

Route::get('/', [UserController::class,'index'])->name('user.home');

Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');

// Profile
Route::get('/profile/{id}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/profile/edit/{id}', [App\Http\Controllers\ProfileController::class, 'editProfileView'])->name('profile.edit.view');
Route::post('/profile/update/{id}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
Route::get('/providers', [App\Http\Controllers\ServiceProviderController::class, 'providers'])->name('providers');


Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/service/list', [App\Http\Controllers\HomeController::class, 'serviceIndex'])->name('service.list');
// Service Routes
Route::get('/service/type/{id}',   [App\Http\Controllers\Service\ServiceController::class, 'specificService'])->name('type.list');
Route::get('/service/detail/{id}', [App\Http\Controllers\Service\ServiceController::class, 'serviceDetails'])->name('service.detail');
Route::get('/type/services/{id}', [App\Http\Controllers\Service\ServiceController::class, 'specificService'])->name('type.detail');
Route::get('/service/delete/{id}', [App\Http\Controllers\Service\ServiceController::class, 'serviceDelete'])->name('service.delete');
// Middlewared service routes
Route::get('/service/list/create', [App\Http\Controllers\Service\ServiceController::class, 'createService'])->name('service.list.create');
Route::post('/service/list/store', [App\Http\Controllers\Service\ServiceController::class, 'storeService'])->name('service.list.store');
Route::get('/service/create/view', [App\Http\Controllers\Service\ServiceController::class, 'typeCreateview'])->name('service.create.view');
Route::post('/service/type/store', [App\Http\Controllers\Service\ServiceController::class, 'storeType'])->name('type.store');
Route::get('/service/type/update/{id}', [App\Http\Controllers\Service\ServiceController::class, 'updateTypeView'])->name('type.update.view');
Route::patch('/type/update/{id}', [App\Http\Controllers\Service\ServiceController::class, 'updateType'])->name('type.update');

//ServiceProvider Route middlwared
Route::get('/apply/forsp', [App\Http\Controllers\ServiceProviderController::class, 'applyForm'])->name('apply.form');
Route::post('/application/sumbit', [App\Http\Controllers\ServiceProviderController::class, 'applicationSubmit'])->name('application.submit');
Route::get('/application/list', [App\Http\Controllers\ServiceProviderController::class, 'applicationlist'])->name('application.list');
Route::post('/application/action/{provider_id}', [App\Http\Controllers\ServiceProviderController::class, 'providerApprove'])->name('application.action');

// cart
Route::get('selectDate/cart/{id}', [App\Http\Controllers\CartController::class, 'selectDate'])->name('date.cart');
Route::get('service/cart/{id}', [App\Http\Controllers\CartController::class, 'createCart'])->name('create.cart');
Route::get('service/cart', [App\Http\Controllers\CartController::class, 'cartList'])->name('view.cart');
Route::get('cart/accept/{cart_id}', [App\Http\Controllers\CartController::class, 'cartAccept'])->name('cart.accept');
// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/cart/pay/{service_id}', [SslCommerzPaymentController::class, 'exampleHostedCheckout'])->name('goto.payment');

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

// Admin

Route::get('/trans/', [AdminController::class,'transList'])->name('trans');

// User Routes
Route::get('/provider/profile/{id}', [UserController::class,'providerProfile'])->name('provider.profile');
Route::get('/userLogout', [UserController::class,'userLogout'])->name('user.logout');
Route::get('/user/{id}/dashboard', [CartController::class,'cartList'])->name('user.dashboard');
Route::get('/user/profile/{id}', [UserController::class,'profile'])->name('user.profile');
Route::post('/user/profile/{id}/update', [UserController::class,'profileUpdate'])->name('user.profile.update');
Route::get('/user/service/list', [UserController::class,'serviceList'])->name('user.service/list');
Route::get('/job/list', [ServiceProviderController::class,'jobList'])->name('job');
Route::get('/job/approve/{id}', [ServiceProviderController::class,'jobApprove'])->name('job.approve');
Route::get('/job/Deline/{id}', [ServiceProviderController::class,'jobDeline'])->name('job.delete');
Route::get('user/cart/pay/{id}', [UserController::class,'payment'])->name('user.cost.solve');
Route::get('user/pay/{id}/receipt', [UserController::class,'receipt'])->name('user.receipt');
