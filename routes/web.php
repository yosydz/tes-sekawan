<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupirController;
use App\Http\Controllers\PenjagaController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PemesananController;

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
    Route::middleware('role:admin')->get('/home', [HomeController::class, 'index'])->name('home');

    // PEMESANAN
    Route::resource('pemesanan', PemesananController::class);

    //KENDARAAN
    Route::middleware('role:admin')->resource('kendaraan', KendaraanController::class);

    //PEMINJAM
    Route::middleware('role:admin')->resource('peminjam', PeminjamController::class);

    //SUPIR
    Route::middleware('role:admin')->resource('supir', SupirController::class);

    //OPERATOR
    Route::middleware('role:admin')->resource('operator', OperatorController::class);

});
