<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminBajarController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminBannerController;
use App\Http\Controllers\AdminCategoryPostController;
use App\Http\Controllers\AdminConfigurationController;
use App\Http\Controllers\AdminCplController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminDosenController;
use App\Http\Controllers\AdminMatakuliahController;
use App\Http\Controllers\DosenBajarController;
use App\Http\Controllers\DosenCplController;
use App\Http\Controllers\DosenMatakuliahController;

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

Route::get('/', [HomeController::class, 'index']);



Route::prefix('/admin/auth')->group(function () {
    Route::get('/', [AdminAuthController::class, 'index'])->middleware('guest')->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);

    Route::get('/register', [AdminAuthController::class, 'register']);
    Route::post('/doRegister', [AdminAuthController::class, 'doRegsiter']);
    Route::get('/logout', [AdminAuthController::class, 'logout']);
});


Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index']);

    Route::resource('/bajar', AdminBajarController::class);

    Route::get('/matakuliah/pengampuh/delete/{id}', [AdminMatakuliahController::class, 'deletePengampuh']);
    Route::post('/matakuliah/pengampuh/add', [AdminMatakuliahController::class, 'addPengampuh']);
    Route::put('/matakuliah/upload/{id}', [AdminMatakuliahController::class, 'upload']);
    Route::get('/matakuliah/download', [AdminMatakuliahController::class, 'download']);
    Route::resource('/matakuliah', AdminMatakuliahController::class);
    Route::resource('/dosen', AdminDosenController::class);

    Route::resource('/user', AdminUserController::class);

    Route::get('/konfigurasi', [AdminConfigurationController::class, 'index']);
    Route::put('/konfigurasi/update', [AdminConfigurationController::class, 'update']);

    Route::resource('/banner', AdminBannerController::class);


    Route::prefix('/posts')->group(function () {
        Route::resource('/post', AdminPostController::class);
        Route::resource('/kategori', AdminCategoryPostController::class);
    });
});


Route::prefix('/dosen')->middleware('auth')->group(function () {

    Route::prefix('/matakuliah')->group(function () {
        Route::get('/', [DosenMatakuliahController::class, 'index']);
        Route::get('/ptik', [DosenMatakuliahController::class, 'ptik']);
        Route::get('/tekom', [DosenMatakuliahController::class, 'tekom']);
        Route::get('/bajar/download', [DosenBajarController::class, 'download']);

        Route::resource('/cpl', DosenCplController::class);
    });
    Route::resource('/bajar', DosenBajarController::class);
});
Route::prefix('/home')->group(function () {
    // Route::resource('/mitra', HomeMitraController::class);;
    // Route::resource('/layanan', HomeLayananController::class);;
});
