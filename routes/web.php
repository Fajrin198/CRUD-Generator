<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ModuleGeneratorController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::resource('posts', PostController::class);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/', [MenuController::class, 'index'])->name('index');
Route::get('/', function () {
    return view('login');
});
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store'])->name('registration');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/admin', [AdminController::class, 'admin'])->middleware('auth');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/index', [MenuController::class, 'index']);
});

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

Route::resource('mahasiswa', App\Http\Controllers\MahasiswaController::class);
