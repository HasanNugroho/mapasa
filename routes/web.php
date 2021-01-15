<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\KegiatanController;
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

Route::group(['middleware' => ['auth'], 'prefix' => '/dashboard'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
});

// Admin Agenda Mendatang
Route::group(['middleware' => ['auth'], 'prefix' => '/dashboard/agenda'], function(){
    Route::get('', [AgendaController::class, 'index'])->name('home');
    Route::post('/add', [AgendaController::class, 'store'])->name('add.agenda');
    Route::get('/{id}/edit', [AgendaController::class, 'agenda_edit'])->name('edit.contact');
    Route::post('/{id}/update', [AgendaController::class, 'update'])->name('update.contact');
    Route::get('/{id}/hapus', [AgendaController::class, 'hapus'])->name('hapus.contact');
});

// Admin Kegiatan
Route::group(['middleware' => ['auth'], 'prefix' => '/dashboard/kegiatan'], function(){
    Route::get('', [KegiatanController::class, 'index'])->name('home');
    Route::post('/store', [KegiatanController::class, 'store'])->name('add.kegiatan');
    Route::get('/{id}/edit', [KegiatanController::class, 'edit'])->name('edit.kegiatan');
    Route::get('/{id}/hapus', [KegiatanController::class, 'hapus'])->name('hapus.kegiatan');
});