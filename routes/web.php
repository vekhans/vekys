<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Depan\BerandaController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\PendidikansController;
use App\Http\Controllers\Admin\SkillsController;
use App\Http\Controllers\Admin\PengalamansController;
use App\Http\Controllers\Admin\KontaksController; 
use App\Http\Controllers\Depan\KontakController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [BerandaController::class, 'index']);
Route::get('/beranda', [BerandaController::class, 'beranda'])->name('beranda');
Route::get('/pendidikan', [BerandaController::class, 'pendidikan'])->name('pendidikan');
Route::get('/skill', [BerandaController::class, 'skill'])->name('skill');
Route::get('/tentang', [BerandaController::class, 'tentang'])->name('tentang');
Route::resource('/kontak', KontakController::class)->only('index','store');

Auth::routes();

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
Route::resource('/profil', ProfilController::class);
Route::resource('/slide', SlideController::class);
Route::resource('/profil/{users}/pendidikans', PendidikansController::class);
Route::resource('/profil/{users}/skills', SkillsController::class);
Route::resource('/profil/{users}/pengalamans', PengalamansController::class);
Route::resource('/kontaks', KontaksController::class)->only('index','show','destroy');
