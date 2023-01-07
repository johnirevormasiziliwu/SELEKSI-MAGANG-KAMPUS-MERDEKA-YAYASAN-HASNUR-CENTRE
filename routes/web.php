<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Monitoring

Route::middleware(['auth'])->group(function() {

    Route::get('/', function () {
        return redirect(route('index'));
    });


    Route::get('/monitoring', [MonitoringController::class, 'index'])->name('index');

    Route::get('/create', [MonitoringController::class, 'create'])->name('create');

    Route::post('/store', [MonitoringController::class, 'store'])->name('store');

    Route::get('/edit/{monitorings}', [MonitoringController::class, 'edit'])->name('edit');

    Route::put('/update/{monitorings}', [MonitoringController::class, 'update'])->name('update');

    Route::delete('/delete/{monitorings}', [MonitoringController::class, 'delete'])->name('delete');
});





    // Login

    Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');

    Route::post('/loginuser', [LoginController::class, 'authenticate'])->name('authenticate');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    //Register

    Route::get('/register', [RegisterController::class, 'register'])->name('register')->middleware('guest');

    Route::post('/verifyuser', [RegisterController::class, 'store'])->name('verify');




