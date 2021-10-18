<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
// GET LOGIN AND REGISTER PAGE
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('login.admin');
Route::get('/login/anggota', 'Auth\LoginController@showAnggotaLoginForm')->name('login.anggota');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterController')->name('register.admin');
Route::get('/register/anggota', 'Auth\RegisterController@showAnggotaRegisterController')->name('register.anggota');
// POST ADMIN & ANGGOTA DATA
Route::post('/login/admin', 'Auth\LoginController@adminLogin')->name('login.admin.store');
Route::post('/login/anggota', 'Auth\LoginController@anggotaLogin')->name('login.anggota.store');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('register.admin.store');
Route::post('/register/anggota', 'Auth\RegisterController@createAnggota')->name('register.anggota.store');

// Admin - Buku
Route::get('/admin/buku', 'Buku\BukuController@allBukus')->name('admin.buku.index');
Route::get('/admin/buku/create', 'Buku\BukuController@adminCreateBuku')->name('admin.buku.create');
Route::get('/admin/buku/edit/{buku}', 'Buku\BukuController@adminEditBuku')->name('admin.buku.edit');
// Admin - Anggota
Route::get('/admin/anggota', 'Anggota\AnggotaController@allAnggotas')->name('admin.anggota.index');
Route::get('/admin/anggota/create', 'Anggota\AnggotaController@adminCreateAnggota')->name('admin.anggota.create');
Route::get('/admin/anggota/edit/{anggota}', 'Anggota\AnggotaController@adminEditAnggota')->name('admin.anggota.edit');
// Admin - Peminjaman Buku
Route::get('/admin/peminjaman', 'Peminjaman\PeminjamanController@allPeminjamans')->name('admin.peminjaman.index');
Route::post('/admin/peminjaman/approve/{anggota}', 'Peminjaman\PeminjamanController@peminjamanApprove')->name('peminjaman.approve');
Route::post('/admin/peminjaman/reject/{anggota}', 'Peminjaman\PeminjamanController@peminjamanReject')->name('peminjaman.reject');
Route::post('/admin/peminjaman/done/{anggota}', 'Peminjaman\PeminjamanController@peminjamanDone')->name('peminjaman.done');

// Anggota
Route::resource('admin', 'Admin\AdminController');
Route::resource('anggota', 'Anggota\AnggotaController');
Route::resource('anggota', 'Anggota\AnggotaController');
Route::resource('buku', 'Buku\BukuController');
Route::get('/peminjaman/create/{buku}', 'Peminjaman\PeminjamanController@create')->name('peminjaman.create');
Route::resource('peminjaman', 'Peminjaman\PeminjamanController');
Route::get('/search', 'Buku\BukuController@searchBooks')->name('search-books');
