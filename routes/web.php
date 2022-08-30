<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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
    return redirect('cek');
});

Route::get('about', function () {
    return view('about');
});

Route::get('help', function () {
    return view('help');
});

Route::get('cek', [OrderController::class, 'index'])->name('cek');
Route::get('getprovince', [OrderController::class, 'getProvince'])->name('getprovince');
Route::get('getcity', [OrderController::class, 'getCity'])->name('getcity');
Route::get('getsubdistrict', [OrderController::class, 'getSubdistrict'])->name('getsubdistrict');
Route::post('progress-shipping', [OrderController::class, 'progressShipping'])->name('progress-shipping');
Route::get('autocomplete-city', [OrderController::class, 'autoCompleteCity']);
