<?php

use App\Http\Controllers\lelangController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\barangLelangController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\dashController;
use App\Http\Controllers\historyLelangController;
use App\Http\Controllers\homeAdminController;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\pendataanController;
use App\Http\Controllers\petugasController;
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

// MASYARAKAT
Route::group(['middleware' => ['auth:web']], function (){
    // Home Masyarakat
    Route::get('/', [lelangController::class, 'home'])->name('home');

    // Tampil menu Penawaran Barang
    Route::get('penawaran-barang', [lelangController::class, 'penawaranBarang'])->name('penawaranBarang');

    // Tampil data barang
    Route::get('data-barang/{id}', [barangController::class, 'barang'])->name('barang');

    // Tawar barang
    Route::get('tawar-barang/{id}', [historyLelangController::class, 'tawarBarang'])->name('tawarBarang');
    Route::post('insert-tawar', [historyLelangController::class, 'insertTawar'])->name('insertTawar');

    // Edit Penawaran
    Route::get('edit-penawaran/{id}', [historyLelangController::class, 'editTawar'])->name('editTawar');
    Route::post('update-penawaran/{id}', [historyLelangController::class, 'updateTawar'])->name('updateTawar');

    // Tampil data history
    Route::get('history', [historyLelangController::class, 'index'])->name('history');

    // Tampil data pemenang lelang
    Route::get('pemenang-lelang', [lelangController::class, 'pemenangLelang'])->name('pemenangLelang');

});

// ADMIN & ADMINISTRATOR
Route::group(['middleware' => ['auth:petugasG']], function (){
    // Home Admin
    Route::get('admin', [dashboardController::class, 'index'])->name('admin');

    // Pendataan Barang
    Route::get('pendataan-barang', [barangController::class, 'data'])->name('pendataan');

    // Tambah Data Barang
    Route::get('tambah-barang', [barangController::class, 'tambahBarang'])->name('tambahBarang');
    Route::post('insert-barang', [barangController::class, 'insertBarang'])->name('insertBarang');

    // Edit Data Barang
    Route::get('edit-barang/{id}', [barangController::class, 'editBarang'])->name('editBarang');
    Route::post('update-barang/{id}', [barangController::class, 'updateBarang'])->name('updateBarang');

    // Hapus Data Barang
    Route::get('hapus-barang/{id}', [barangController::class, 'hapusBarang'])->name('hapusBarang');

    // Detail Barang
    Route::get('detail-barang/{id}', [barangController::class, 'detailBarang'])->name('detailBarang');

    // Generate Laporan
    Route::get('laporan', [laporanController::class, 'laporanAdmin'])->name('laporanAdmin');
    Route::get('print-laporan', [laporanController::class, 'printLaporan'])->name('printLaporan');
    // Filter Data
    Route::get('filter', [laporanController::class, 'filterData'])->name('filterData');


    // Aktivasi Barang
    Route::get('aktivasi-barang', [lelangController::class, 'index'])->name('aktivasi');
    Route::post('tutup/{id}', [lelangController::class, 'tutupLelang'])->name('tutupLelang');
    Route::post('buka/{id}', [lelangController::class, 'bukaLelang'])->name('bukaLelang');

    // Tambah Lelang
    Route::get('tambah-lelang', [lelangController::class, 'tambahLelang'])->name('tambahLelang');
    Route::post('insert-lelang', [lelangController::class, 'insertLelang'])->name('insertLelang');


    // Petugas
    Route::get('petugas', [petugasController::class, 'index'])->name('index');

    // Tambah Petugas
    Route::get('tambah-petugas', [petugasController::class, 'tambahPetugas'])->name('tambahPetugas');
    Route::post('insert-petugas', [petugasController::class, 'insertPetugas'])->name('insertPetugas');

    // Edit Petugas
    Route::get('edit-petugas/{id}', [petugasController::class, 'editPetugas'])->name('editPetugas');
    Route::post('update-petugas/{id}', [petugasController::class, 'updatePetugas'])->name('updatePetugas');

    // Hapus Petugas
    Route::get('hapus-petugas/{id}', [petugasController::class, 'hapusPetugas'])->name('hapusPetugas');
});

// Login
Route::get('/login', [loginController::class, 'login'])->name('login');
Route::post('/masuk', [loginController::class, 'masuk'])->name('masuk');

// Register
Route::get('register', [loginController::class, 'register'])->name('register');
Route::post('buat-akun', [loginController::class, 'buatAkun'])->name('buatAkun');