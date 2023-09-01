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
    Route::resource('/anggota', '\App\Http\Controllers\Admin\AnggotaController');
    Route::get('/keluhan', [App\Http\Controllers\Admin\KeluhanController::class,'index'])->name('admin.keluhan.index');
    Route::get('/keluhan/{keluhan}', [App\Http\Controllers\Admin\KeluhanController::class,'show'])->name('admin.keluhan.show');
    Route::resource('/sewa_mobil', '\App\Http\Controllers\CarController');
    Route::match(['put','patch'],'/sewa_mobil/{sewa_mobil}', [App\Http\Controllers\CarController::class,'submit'])->name('sewa.submit');
    Route::get('/data_sewa',[App\Http\Controllers\DataSewaController::class,'index'])->name('data_sewa.index');
    Route::post('/data_sewa',[App\Http\Controllers\DataSewaController::class,'store'])->name('data_sewa.store');
    Route::match(['put','patch'],'/data_sewa/{data_sewa}',[App\Http\Controllers\DataSewaController::class,'update'])->name('data_sewa.update');
    Route::resource('/profile', '\App\Http\Controllers\ProfileController');

});
