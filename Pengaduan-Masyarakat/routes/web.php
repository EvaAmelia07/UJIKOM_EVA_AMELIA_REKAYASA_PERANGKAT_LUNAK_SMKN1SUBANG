<?php

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sikulat/tentang-aplikasi', 'Admin\BerandaController@index_tentang')->name('tentang');

// Admin
Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function() {
    // Route::resource('/akun', 'UserController', ['except' => ['show', 'create', 'store']]);
    Route::get('/beranda', 'BerandaController@index')->name('beranda.index');
    Route::get('/data-petugas', 'BerandaController@index_petugas')->name('beranda.petugas');
    Route::get('/data-masyarakat', 'BerandaController@index_masyarakat')->name('beranda.masyarakat');
    Route::get('/tambah/petugas', 'BerandaController@tambah_petugas')->name('petugas.tambah');
    Route::post('/register/petugas', 'BerandaController@RegisterPetugas')->name('register.petugas');
    Route::delete('/data-petugas/delete/{id}', 'BerandaController@delete_petugas')->name('petugas.delete');
    Route::get('/aduan/detail/{id}', 'BerandaController@aduan_detail')->name('aduan.detail');

   
});

// Petugas
Route::namespace('Petugas')->prefix('petugas')->middleware(['auth', 'petugas'])->name('petugas.')->group(function() {
    Route::get('/beranda', 'BerandaController@index')->name('beranda.index');
    Route::get('/data-petugas', 'BerandaController@data_petugas')->name('beranda.petugas');
    Route::get('/data-masyarakat', 'BerandaController@data_masyarakat')->name('beranda.masyarakat');
    Route::get('/balas-keluhan/{id}', 'BerandaController@balasan_keluhan')->name('beranda.balasan');
    Route::post('/balas-keluhan/balas', 'BerandaController@tanggapan')->name('beranda.tanggapan');
    Route::get('/edit-petugas/{id}', 'BerandaController@editPetugas')->name('edit.petugas');
    Route::put('/update/{id}', 'BerandaController@updatePetugas')->name('update.petugas');
});

// Masyarakat
Route::namespace('Masyarakat')->prefix('masyarakat')->middleware(['auth', 'masyarakat'])->name('masyarakat.')->group(function() {
    Route::get('/beranda', 'BerandaController@index')->name('beranda.index');
    Route::get('/tulis-aduan', 'BerandaController@tulis_aduan')->name('beranda.aduan');
    Route::get('/aduan-saya', 'BerandaController@aduan_saya')->name('beranda.aduansaya');
    Route::get('/detail-aduan/{id}', 'BerandaController@detail_aduan')->name('beranda.detailaduan');
    // route tulis aduan
    Route::post('/tulis-aduan/store', 'BerandaController@store')->name('beranda.store');
    Route::delete('/tulis-aduan/delete/{id}', 'BerandaController@delete_aduan')->name('beranda.delete');
    Route::get('/edit-aduan/{id}', 'BerandaController@edit_aduan')->name('beranda.edit');
    Route::put('/edit-aduan/{id}/update', 'BerandaController@update_aduan')->name('beranda.update');
});
