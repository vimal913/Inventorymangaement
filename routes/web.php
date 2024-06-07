<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('user.home');
});


Route::group(['prefix' => 'user'], function ()
    {
        Route::get('login', [App\Http\Controllers\userController::class, 'login'])->name('login');
        Route::post('loginstore', [App\Http\Controllers\userController::class, 'loginStore'])->name('loginstore');
        Route::get('register', [App\Http\Controllers\userController::class, 'register'])->name('register');
        Route::post('registerstore', [App\Http\Controllers\userController::class, 'registerStore'])->name('registerstore');
        Route::get('changepassword/{id}', [App\Http\Controllers\userController::class, 'changepassword'])->name('changepassword');
        Route::post('changepasswordstore', [App\Http\Controllers\userController::class, 'changepasswordStore'])->name('changepasswordstore');

        Route::get('logout', [App\Http\Controllers\userController::class, 'logout'])->name('logout');
        Route::get('profile', [App\Http\Controllers\userController::class, 'profile'])->name('Profile');
        Route::group(['middleware' => ['user']], function ()
        {
            Route::get('home', [App\Http\Controllers\InventoryController::class, 'home'])->name('Home');
            // Route::get('profile', [App\Http\Controllers\userController::class, 'profile'])->name('Profile');
        });
    });