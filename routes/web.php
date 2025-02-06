<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ModuleGeneratorController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\PostController;

Route::resource('posts', PostController::class);

Route::get('/', [MenuController::class, 'index'])->name('index');
Route::get('/index', [MenuController::class, 'index'])->name('index');

Route::get('/superAdmin', [SuperAdminController::class, 'index'])->name('superAdmin');
Route::delete('/superAdmin1', [SuperAdminController::class, 'destroy'])->name('superAdmin.destroy');

Route::get('/addMenu', [MenuController::class, 'addMenu'])->name('addMenu');
Route::get('/displayTable', [MenuController::class, 'displayTable'])->name('displayTable');
Route::get('/formDisplay', [MenuController::class, 'formDisplay'])->name('formDisplay');
Route::get('/configuration', [MenuController::class, 'configuration'])->name('configuration');
Route::post('/', [MenuController::class, 'store'])->name('store');
Route::post('/displayTable2', [MenuController::class, 'addIterasi'])->name('addIterasi');
Route::post('/displayTable1', [MenuController::class, 'processForm'])->name('processForm');
Route::post('/displayTable3', [MenuController::class, 'processForm2'])->name('processForm2');
// Route::get('/{menu}', [MenuController::class, 'show'])->name('show');

// Route::namespace('App\Http\Controllers')->group(function () {
//     Route::get('/home', 'HomeController@index');
//     Route::get('/profile', 'ProfileController@index');
// });
// Route::get('/', [ModuleGeneratorController::class, 'index'])->name('module-generator.index');
// Route::post('/module-generator', [ModuleGeneratorController::class, 'generate'])->name('module-generator.generate');
Route::resource('mahasiswa', App\Http\Controllers\MahasiswaController::class);

Route::resource('siswa', App\Http\Controllers\SiswaController::class);

Route::resource('buah-buahan', App\Http\Controllers\BuahController::class);

Route::resource('olahraga', App\Http\Controllers\AtletController::class);

Route::resource('barang', App\Http\Controllers\BarangController::class);
