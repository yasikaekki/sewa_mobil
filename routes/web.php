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

Route::get('/daftar',[App\Http\Controllers\Auth\DaftarController::class,'create'])->name('auth.daftar');
Route::post('/daftar/store',[App\Http\Controllers\Auth\DaftarController::class,'store'])->name('daftar.store');

Auth::routes();

Route::group(['prefix' => 'home', 'middleware' => 'auth'], function(){
    Route::get('/',[App\Http\Controllers\HomeController::class,'index'])->name('home');
    Route::resource('/sewa_mobil', '\App\Http\Controllers\CarController');
    Route::resource('/profile', '\App\Http\Controllers\ProfileController');

});
