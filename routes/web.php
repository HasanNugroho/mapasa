<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\FeedbackController;
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

Route::group(['middleware' => ['VisitorCount'], 'prefix' => '/'], function(){
    Route::get('', [FrontendController::class, 'index'])->name('landing');
    Route::post('saran', [FeedbackController::class, 'store'])->name('saran.store');
    Route::get('blog/{slug}', [FrontendController::class, 'blog'])->name('blog.front');
    Route::get('galeri/{slug}', [FrontendController::class, 'galeri'])->name('galeri.front');
    Route::get('galeri', [FrontendController::class, 'semua_galeri'])->name('galeri.semua');
    Route::get('blog', [FrontendController::class, 'semua_blog'])->name('blog.semua');
    Route::get('kegiatan', [FrontendController::class, 'semua_kegiatan'])->name('kegiatan.semua');
    Route::get('kegiatan/{id}', [FrontendController::class, 'kegiatan'])->name('kegiatan.lihat');
    Route::get('event/{slug}', [FrontendController::class, 'event'])->name('event.lihat');
});

// Route::get('/event', function () {
//     return view('event');
// });

Auth::routes();
// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboardstart')->middleware(['auth', 'VisitorCount']); //general

Route::group(['middleware' => ['auth'], 'prefix' => '/dashboard'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('dashboardstart');
    Route::get('/feedback/see/{id}', [FeedbackController::class, 'see'])->name('feedback.see');
    Route::get('/feedback/{id}/hapus', [FeedbackController::class, 'delete'])->name('feedback.hapus');
});

// Khusus Superadmin
Route::group(['middleware' => ['auth', 'Superadmin'], 'prefix' => '/dashboard/admin/manage/'], function () {
    Route::get('', [AdminController::class, 'manage'])->name('admin.manage');
    Route::post('store', [AdminController::class, 'store'])->name('add.admin');
    Route::get('{id}/edit', [AdminController::class, 'edit'])->name('edit.admin');
    Route::post('update', [AdminController::class, 'update2'])->name('update.admin');
    Route::get('{id}/delete', [AdminController::class, 'delete'])->name('delete.admin');
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

// Admin Profile
Route::group(['middleware' => ['auth'], 'prefix' => '/dashboard/profile'], function(){
    Route::get('', [AdminController::class, 'index'])->name('profile');
    Route::post('/update', [AdminController::class, 'update'])->name('profile.update');
});

// Admin web manage jumbotron
Route::group(['middleware' => ['auth'], 'prefix' => '/dashboard/web/jumbotron'], function(){
    Route::get('', [ManageController::class, 'index_jumbotron'])->name('jumbotron');
    Route::post('/update', [ManageController::class, 'update_jumbotron'])->name('update.jumbotron');
});

// Admin web manage sejarah
Route::group(['middleware' => ['auth'], 'prefix' => '/dashboard/web/sejarah'], function(){
    Route::get('', [ManageController::class, 'index_sejarah'])->name('sejarah');
    Route::post('/update', [ManageController::class, 'update_sejarah'])->name('update.sejarah');
});

// Admin galeri
Route::group(['middleware' => ['auth'], 'prefix' => '/dashboard/galeri'], function(){
    Route::get('', [GaleriController::class, 'index'])->name('galeri');
    Route::post('/store', [GaleriController::class, 'store'])->name('add.galeri');
    Route::get('/see/{id}', [GaleriController::class, 'see'])->name('see.galeri');
    Route::get('/{id}/hapus', [GaleriController::class, 'delete'])->name('hapus.galeri');
    Route::get('/{id}/edit', [GaleriController::class, 'edit'])->name('edit.galeri');
    Route::post('/update', [GaleriController::class, 'update'])->name('update.galeri');
});