<?php

use App\Http\Controllers\TruckController;
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
    return view('home');
})->name('home');

Route::resource('trucks', TruckController::class);

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/trucks/create', [TruckController::class, 'create'])->name('trucks.create');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::any('/{any}', function () {
    return view('404');
})->where('any', '.*');
