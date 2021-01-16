<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PengumumanController;
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
    Route::get('', [AgendaController::class, 'index'])->name('agenda');
    Route::post('/add', [AgendaController::class, 'store'])->name('add.agenda');
    Route::get('/{id}/edit', [AgendaController::class, 'agenda_edit'])->name('edit.contact');
    Route::post('/{id}/update', [AgendaController::class, 'update'])->name('update.contact');
    Route::get('/{id}/hapus', [AgendaController::class, 'hapus'])->name('hapus.contact');
});

// Admin Kegiatan
Route::group(['middleware' => ['auth'], 'prefix' => '/dashboard/kegiatan'], function(){
    Route::get('', [KegiatanController::class, 'index'])->name('kegiatan');
    Route::post('/store', [KegiatanController::class, 'store'])->name('add.kegiatan');
    Route::get('/{id}/edit', [KegiatanController::class, 'edit'])->name('edit.kegiatan');
    Route::post('/update', [KegiatanController::class, 'update'])->name('update.kegiatan');
    Route::get('/{id}/hapus', [KegiatanController::class, 'hapus'])->name('hapus.kegiatan');
});

// Admin Event
Route::group(['middleware' => ['auth'], 'prefix' => '/dashboard/event'], function(){
    Route::get('', [EventController::class, 'index'])->name('event');
    Route::post('/store', [EventController::class, 'store'])->name('add.event');
    Route::get('/{id}/edit', [EventController::class, 'edit']);
    Route::post('/update', [EventController::class, 'update'])->name('update.event');
    Route::get('/{id}/hapus', [EventController::class, 'hapus']);
});

// Admin Blog
Route::group(['middleware' => ['auth'], 'prefix' => '/dashboard/blog'], function(){
    Route::get('', [BlogController::class, 'index'])->name('blog');
    Route::post('/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/update', [BlogController::class, 'update'])->name('update.blog');
    Route::get('/{id}/hapus', [BlogController::class, 'hapus'])->name('blog.hapus');
});

// Admin pengumuman
Route::group(['middleware' => ['auth'], 'prefix' => '/dashboard/pengumuman'], function(){
    Route::get('', [PengumumanController::class, 'index'])->name('pengumuman');
    Route::post('/store', [PengumumanController::class, 'store'])->name('pengumuman.store');
    Route::get('/{id}/edit', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
    Route::post('/{id}/update', [PengumumanController::class, 'update'])->name('pengumuman.update');
    Route::get('/{id}/hapus', [PengumumanController::class, 'hapus'])->name('pengumuman.hapus');
});