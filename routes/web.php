<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/home-list', [App\Http\Controllers\MainController::class, 'list'])->name('list');
    Route::get('/add-home', [App\Http\Controllers\MainController::class, 'addHome'])->name('addHome');
    Route::post('/submit-home', [App\Http\Controllers\MainController::class, 'submitHome'])->name('submitHome');
    Route::get('/edit-home/{id}', [App\Http\Controllers\MainController::class, 'editHome'])->name('editHome');
    Route::get('/edit-home-status', [App\Http\Controllers\MainController::class, 'editHomeStatus'])->name('editHomeStatus');
    Route::get('/delete-home-image', [App\Http\Controllers\MainController::class, 'deleteimage'])->name('deleteimage');
    Route::get('/know-more', [App\Http\Controllers\MainController::class, 'knowMore'])->name('knowMore');
    Route::get('/filter-properties', [App\Http\Controllers\MainController::class, 'filterproperty'])->name('filterproperty');
    Route::get('/filter-order', [App\Http\Controllers\MainController::class, 'filterorder'])->name('filterorder');



    Route::get('/vehicle-list', [App\Http\Controllers\VehicleController::class, 'vehicleList'])->name('vehicleList');
    Route::get('/add-vehicle', [App\Http\Controllers\VehicleController::class, 'addVehicle'])->name('addVehicle');
    Route::post('/submit-vehicle', [App\Http\Controllers\VehicleController::class, 'submitVehicle'])->name('submitVehicle');
    Route::get('/edit-vehicle/{id}', [App\Http\Controllers\VehicleController::class, 'editVehicle'])->name('editVehicle');
    Route::get('/delete-vehicle-image', [App\Http\Controllers\VehicleController::class, 'deleteVehicleImage'])->name('deleteVehicleImage');
    Route::get('/filter-vehicle', [App\Http\Controllers\VehicleController::class, 'filterVehicle'])->name('filterVehicle');
});
