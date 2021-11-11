<?php

use App\Http\Controllers\Admin\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//*********************Admin Route**************************
Route::prefix('admin')->middleware(['auth','admin'])->group(
    Route::get('/dashboard',[AdminController::class,'index'])->name('admin.dashboard')
);

//*********************Admin Route**************************

Route::prefix('admin')->middleware(['auth','user'])->group(
    Route::get('/dashboard',[AdminController::class,'index'])->name('user.dashboard')
);
