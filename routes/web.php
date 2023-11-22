<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\mmControlers;
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
Route::get('/', function () {     return view('home'); });
Route::get('/auth/login', [LoginRegisterController::class, 'login'])->name('auth.login');
Route::get('/auth/Register', [LoginRegisterController::class, 'Register'])->name('auth.Register');
Route::get('/mm/beritaKsi', [mmControlers::class, 'beritaKsi'])->name('mm.beritaKsi');
Route::get('/mm/profilDosen', [mmControlers::class, 'profilDosen'])->name('mm.profilDosen');
Route::get('/mm/profilKelulusanKSI', [mmControlers::class, 'profilKelulusanKSI'])->name('mm.profilKelulusanKSI');

Route::get('/user/home',[LoginRegisterController::class, 'userHome'])->name('user.home');
Route::get('/admin/home',[LoginRegisterController::class, 'adminHome'])->name('admin.home');

Route::post('/postRegister', [LoginRegisterController::class, 'postRegister'])->name('postRegister');
Route::post('/postLogin', [LoginRegisterController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');

Route::middleware(['guest'])->group(function () {
    Route::get('/', function() {
        return view('home');
    });
    Route::get('auth/login', [LoginRegisterController::class, 'login'])->name('auth.login');
    Route::get('auth/register', [LoginRegisterController::class, 'register'])->name('auth.register');
});

Route::group(['middleware' => ['auth', 'checklevel:admin']], function () {
    Route::get('/admin/home', [LoginRegisterController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/tambah', [AdminController::class, 'tambah'])->name('admin.tambah');
    Route::get('/admin/editAdmin/{id}', [AdminController::class, 'editAdmin'])->name('editAdmin');
    Route::get('/admin/deleteAdmin/{id}', [AdminController::class, 'deleteAdmin'])->name('deleteAdmin');
    Route::get('/admin/buku', [AdminController::class, 'adminBuku'])->name('admin.buku');

Route::get('/admin/tambahBuku', [AdminController::class, 'tambahBuku'])->name('admin.tambahBuku');
Route::get('/admin/editBuku/{id}', [AdminController::class, 'editBuku'])->name('admin.editBuku');
Route::get('/admin/deleteBuku/{id}', [AdminController::class, 'deleteBuku'])->name('admin.deleteBuku');
Route::get('/admin/peminjaman', [AdminController::class, 'adminPeminjaman'])->name('admin.peminjaman');

Route::get('/admin/tambah_Peminjaman', [AdminController::class, 'tambahPeminjaman'])->name('admin.tambahPeminjaman');
Route::get('/admin/editpeminjaman/{id}', [AdminController::class, 'editPeminjaman'])->name('admin.editPeminjaman');
Route::get('/admin/deletePeminjaman/{id}', [AdminController::class, 'deletePeminjaman'])->name('admin.deletePeminjaman'); 
Route::get('/admin/detail_peminjaman/{id_peminjaman}/{id_user}/{id_buku}', [AdminController::class, 'detailPeminjaman'])->name('admin.detailPeminjaman');

});
Route::post('/postTambahBuku', [AdminController::class, 'posttambahBuku'])->name('posttambahBuku');
Route::post('/postEditBuku/{id}', [AdminController::class, 'postEditBuku'])->name('postEditBuku');
Route::post('/tambahAdmin', [AdminController::class, 'postTambahAdmin'])->name('postTambahAdmin');
Route::post('/postEditAdmin/{id}', [AdminController::class, 'postEditAdmin'])->name('postEditAdmin');
Route::post('/postTambahPeminjaman', [AdminController::class, 'postTambahPeminjaman'])->name('postTambahPeminjaman'); 
Route::post('/postEditPeminjaman/{id}', [AdminController::class, 'postEditPeminjaman'])->name('postEditPeminjaman');


Route::group(['middleware' => ['auth', 'checklevel:user']], function () {
    Route::get('/user/home', [LoginRegisterController::class, 'userHome'])->name('user.home');
});

Route::get('/news',[Navbar::class, 'news'])->name('news');
Route::get('/profile',[Navbar::class, 'profile'])->name('profile');
Route::get('/dosen',[Navbar::class, 'dosen'])->name('dosen');
Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');
Route::get('/input',[Navbar::class, 'input'])->name('input');
Route::get('/inputdosen',[Navbar::class, 'inputdosen'])->name('inputdosen');