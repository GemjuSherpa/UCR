<?php

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user', [App\Http\Controllers\UserAccountController::class, 'index'])->name('user-account');
Route::put('/user/update', [App\Http\Controllers\UserAccountController::class, 'update'])->name('update-account');
Route::post('/user/addbalance', [App\Http\Controllers\UserAccountController::class, 'addBalance'])->name('add-balance');



// rental routes
Route::get('/rental/{id}', [App\Http\Controllers\RentalController::class, 'index'])->name('booking');
Route::get('/rental/{id}/summary', [App\Http\Controllers\RentalController::class, 'summary'])->name('booking-summary');

Route::get('/rental/{id}/create', [App\Http\Controllers\RentalController::class, 'create'])->name('booking-create');


// master computer route
Route::get('/master-computer', [App\Http\Controllers\Computer\MasterComputerController::class, 'index'])->name('computer');
Route::get('/master-computer/add', [App\Http\Controllers\Computer\MasterComputerController::class, 'add'])->name('add-computer');
Route::post('/master-computer/store', [App\Http\Controllers\Computer\MasterComputerController::class, 'store'])->name('store-computer');
Route::delete('/master-computer/destroy', [App\Http\Controllers\Computer\MasterComputerController::class, 'destroy'])->name('destroy-computer');
Route::put('/master-computer/update', [App\Http\Controllers\Computer\MasterComputerController::class, 'update'])->name('update-computer');


Route::get('/browse', [App\Http\Controllers\BrowseController::class, 'index'])->name('browse');
Route::post('/browse/sort', [App\Http\Controllers\BrowseController::class, 'sort'])->name('sort-computer');
Route::get('/browse/detail/{id}', [App\Http\Controllers\BrowseController::class, 'detail'])->name('detail');

// Admin routes
Route::get('/admin-dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');

