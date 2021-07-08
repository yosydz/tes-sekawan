<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimController;
use App\Http\Controllers\SupirController;
use App\Http\Controllers\PenjagaController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\KendaraanController;

// use App\Http\Controllers\KegiatanController;

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

Route::group(['middleware' => 'auth'], function () {

    //LARAVEL UI AUTH
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    // HOME
    Route::get('/home', [KendaraanController::class, 'index'])->name('home');

    //KENDARAAN
    Route::resource('kendaraan', KendaraanController::class);

    //PEMINJAM
    Route::resource('peminjam', PeminjamController::class);

    //SUPIR
    Route::resource('supir', SupirController::class);
});
