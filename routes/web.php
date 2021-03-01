<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PresensiController;

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


Route::get('/index', [LoginController::class, 'index'])->name('index');
Route::post('/login', [LoginController::class, 'login'])->name('login_post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'viewRegister'])->name('viewRegister');
Route::post('/register', [LoginController::class, 'register'])->name('register');

Route::group(['middleware' => ['auth', 'userRole:admin,karyawan']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::group(['middleware' => ['auth', 'userRole:karyawan,admin']], function () {
    Route::get('/presensi-masuk', [PresensiController::class, 'index'])->name('presensi-masuk');
    Route::get('/presensi-keluar', [PresensiController::class, 'presensiKeluar'])->name('presensi-keluar');
    Route::post('/presensi-masuk', [PresensiController::class, 'store'])->name('save-masuk');
    Route::post('/presensi-keluar', [PresensiController::class, 'pulang'])->name('save-keluar');
});
