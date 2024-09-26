<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\CustomerAuthController;

//Home route
Route::get('/', function () {
    return view('auth.login');
});
// admin route
Route::get('/login', [CustomerAuthController::class, 'loginShow'])->name('login');
Route::post('/login', [CustomerAuthController::class, 'authCheck'])->name('login.check');

Route::group(['middleware' => ['auth:customer']], function () {
    Route::get('logout', [CustomerAuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [CustomerAuthController::class, 'dashboard'])->name('dashboard');
    Route::prefix('setting')->group(function () {
        Route::get('/user-edit', [InstituteController::class, 'edit'])->name('user.edit');
        Route::put('/user-update', [InstituteController::class, 'updateUser'])->name('user.update');
        Route::get('/password/change', [InstituteController::class, 'passwordChange'])->name('password.change');
        Route::post('/password/update', [InstituteController::class, 'passwordUpdate'])->name('password.update');
    });

    //Contact us  route
    Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact.us');
    Route::post('/contact-us/update', [ContactUsController::class, 'update'])->name('contact-us.update');
});
