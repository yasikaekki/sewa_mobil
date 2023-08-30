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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/daftar',[App\Http\Controllers\Auth\DaftarController::class,'index'])->name('auth.daftar');

Auth::routes();

Route::group(['prefix' => 'home', 'middleware' => 'auth'], function(){
    Route::get('/',[App\Http\Controllers\HomeController::class,'index'])->name('home');
    Route::resource('/sewa_mobil', '\App\Http\Controllers\CarController');
    Route::put('/sewa_mobil/{sewa_mobil}', [App\Http\Controllers\CarController::class,'submit'])->name('sewa_mobil.submit');
    Route::get('/data-sewa-mobil',[App\Http\Controllers\DataSewaMobilController::class,'index'])->name('data_sewa_mobil.index');
    Route::resource('/profile', '\App\Http\Controllers\ProfileController');

});
