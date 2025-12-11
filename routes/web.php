<?php

use App\Http\Controllers\ScrathpadController;
use App\Http\Controllers\Settings;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Core\EbayController;
use App\Http\Controllers\Helper\TokenController;
use App\Http\Controllers\Core\ProductController;
use App\Http\Controllers\Access\AccessController;
use App\Http\Controllers\Helper\AuthCodeController;
use App\Http\Controllers\Helper\SupplementaryController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('settings/profile', [Settings\ProfileController::class, 'edit'])->name('settings.profile.edit');
    Route::put('settings/profile', [Settings\ProfileController::class, 'update'])->name('settings.profile.update');
    Route::delete('settings/profile', [Settings\ProfileController::class, 'destroy'])->name('settings.profile.destroy');
    Route::get('settings/password', [Settings\PasswordController::class, 'edit'])->name('settings.password.edit');
    Route::put('settings/password', [Settings\PasswordController::class, 'update'])->name('settings.password.update');
    Route::get('settings/appearance', [Settings\AppearanceController::class, 'edit'])->name('settings.appearance.edit');
});

Route::middleware(['auth'])->group(function () {
    Route::get('token',[TokenController::class,'token'])->name('token');
    Route::match(['get','post'],'import',[ProductController::class,'import'])->name('import');
    Route::match(['get','post'],'view',[ProductController::class,'view'])->name('view');
    Route::match(['get','post'],'product_list',[ProductController::class,'product_list'])->name('plist');
    Route::match(['get','post','delete'],'ebay',[EbayController::class,'manage_acc'])->name('ebay');
    Route::view('page1','page1');
    Route::get('code',[AuthCodeController::class,'code'])->name('code');
    Route::match(['get','post'],'scrathpad',[ScrathpadController::class,'scrathpad'])->name('scrathpad');
    Route::post('set_store',[SupplementaryController::class,'set_store'])->name('set_store');
    Route::get('user_register',[AccessController::class,'user_register'])->name('user_register');
});
Route::get('product/{id}',[ProductController::class,'product'])->name('product');

require __DIR__.'/auth.php';
