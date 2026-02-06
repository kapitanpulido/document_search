<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserManualController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ManualController;

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


Auth::routes();


Route::middleware('auth')->group(function () {

	Route::resource('dashboard', DashboardController::class);	

	Route::resource('upload', DocumentController::class);

	Route::resource('user', UserController::class);

	Route::resource('profile', ProfileController::class);

	Route::resource('manual', ManualController::class);
	
});


Route::resource('/', SearchController::class);

Route::get('/documents/download/{id}', [DocumentController::class, 'download'])
    ->name('documents.download');

