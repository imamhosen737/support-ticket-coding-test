<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\InstituteController;
use App\Http\Controllers\Admin\CustomFieldController;
use App\Http\Controllers\Admin\AuthInstituteController;

//Home route
Route::get('/', function () {
    return view('auth.login');
});
// admin route
Route::get('/login', [AuthInstituteController::class, 'loginShow'])->name('login');
Route::post('/login', [AuthInstituteController::class, 'authCheck'])->name('login.check');

Route::group(['middleware' => ['auth:institute']], function () {
    Route::get('logout', [AuthInstituteController::class, 'logout'])->name('logout');
    Route::get('dashboard', [AuthInstituteController::class, 'dashboard'])->name('dashboard');
    Route::prefix('setting')->group(function () {
        Route::get('/user-edit', [InstituteController::class, 'edit'])->name('user.edit');
        Route::put('/user-update', [InstituteController::class, 'updateUser'])->name('user.update');
        Route::get('/password/change', [InstituteController::class, 'passwordChange'])->name('password.change');
        Route::post('/password/update', [InstituteController::class, 'passwordUpdate'])->name('password.update');
    });


    Route::prefix('setup')->group(function () {
        //Add Custom Field in Institute CRUD Route
        Route::get('/custom-field-entry', [CustomFieldController::class, 'index'])->name('custom-field.index');
        Route::post('/custom-field-store', [CustomFieldController::class, 'store'])->name('custom-field.store');
        Route::put('/custom-field-update/{id}', [CustomFieldController::class, 'update'])->name('custom-field.update');
        Route::get('/edit-custom-field/{id}', [CustomFieldController::class, 'edit'])->name('custom-field.edit');
        Route::delete('/custom-field-delete/{id}', [CustomFieldController::class, 'destroy'])->name('custom-field.destroy');
    });

    //Contact us  route
    Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact.us');
    Route::post('/contact-us/update', [ContactUsController::class, 'update'])->name('contact-us.update');
});
