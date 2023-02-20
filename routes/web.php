<?php

use App\Http\Controllers\admin\BukuController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\IdentitasController;
use App\Http\Controllers\admin\KategoriController;
use App\Http\Controllers\admin\LaporanController;
use App\Http\Controllers\admin\PeminjamanController as AdminPeminjamanController;
use App\Http\Controllers\admin\PenerbitController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\user\DashboardController;
use App\Http\Controllers\user\PeminjamanController;
use App\Http\Controllers\user\PengembalianController;
use App\Http\Controllers\user\ProfileController;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Pesan;
use App\Models\User;
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
Route::post('/register' , [RegisterController::class , 'store'])->name('auth.register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('user')->middleware(['auth' , 'role:user'])->group(function () {
    Route::get('/dashboard' , [DashboardController::class , 'index'])->name('user.dashboard');
    // peminjaman
    Route::get('peminjaman/form' , [PeminjamanController::class, 'indexForm'])->name('user.peminjaman.form');
    Route::get('/peminjaman/riwayat' , [PeminjamanController::class, 'indexRiwayat'])->name('user.peminjaman.riwayat');
    Route::post('/peminjaman/form/submit' , [PeminjamanController::class , 'storeForm'])->name('user.peminjaman.form.submit');
    //pengembalian
    Route::get('/pengembalian/form' , [PengembalianController::class , 'indexForm'])->name('user.pengembalian,form');
    Route::get('/pengembalian/riwayat' , [PengembalianController::class , 'indexRiwayat'])->name('user.pengembalian.riwayat');
    Route::post('/pengembalian/form/submit' , [PengembalianController::class , 'storeForm'])->name('user.pengembalian.form.submit');
    //pesan
    Route::get('/pesan/masuk' , [PesanController::class, 'indexMasuk'])->name('user.pesan.masuk');
    Route::get('/pesan/terkirim' , [PesanController::class , 'indexTerkirim'])->name('user.pesan.terkirim');
    Route::post('/pesan/masuk/Ubah_status', [PesanController::class , 'updateStatus'])->name('user.pesan.masuk.update');
    Route::post('/pesan/kirim' , [PesanController::class, 'kirimPesan'])->name('user.kirim_pesan');
    Route::delete('/pesan/delete/{id}' , [PesanController::class, 'destroyPesan'])->name('user.pesan.delete');
    //profile
    Route::get('/profile' , [ProfileController::class, 'index'])->name('user.profile');
    Route::put('/profile/update/', [ProfileController::class , 'update'])->name('user.profile.update');
});

Route::prefix('admin')->middleware(['auth' , 'role:admin'])->group(function() {
    //dashboard
    Route::get('/dashboard' , [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/identitas' , [IdentitasController::class, 'index'])->name('admin.identitas');
    Route::put('/identitas/update' , [IdentitasController::class, 'update'])->name('admin.identitas.update');
    //penerbit
    Route::get('/penerbit' , [PenerbitController::class, 'index'])->name('admin.data.penerbit');
    Route::post('/penerbit/add' , [PenerbitController::class, 'store'])->name('admin.add.penerbit');
    Route::put('/penerbit/update/{id}' , [PenerbitController::class, 'update'])->name('admin.update.penerbit');
    Route::delete('/penerbit/delete/{id}' , [PenerbitController::class, 'destroy'])->name('admin.delete.penerbit');
    //anggota
    Route::get('/anggota' , [UserController::class, 'indexAnggota'])->name('admin.data.anggota');
    Route::post('/anggota/add' , [UserController::class , 'storeAnggota'])->name('admin.add.anggota');
    Route::put('/anggota/update/{id}' , [UserController::class, 'updateAnggota'])->name('admin.update.anggota');
    Route::delete('/anggota/delete/{id}' , [UserController::class , 'destroyAnggota'])->name('admin.delete.anggota');
    //admin
    Route::get('/administrator' , [UserController::class , 'indexAdmin'])->name('admin.data.admin');
    Route::post('/administrator/add' , [UserController::class , 'storeAdmin'])->name('admin.add.admin');
    Route::get('/administrator/update/{id}', [UserController::class , 'updateAdmin'])->name('admin.update.admin');
    Route::delete('/administrator/delete/{id}' , [UserController::class , 'destroyAdmin'])->name('admin.delete.admin');
    //peminjaman
    Route::get('/datapeminjaman' , [AdminPeminjamanController::class , 'index'])->name('admin.data.peminjaman');
    //buku
    Route::get('/databuku' , [BukuController::class , 'dataBuku'])->name('admin.data.buku');
    Route::post('/databuku/store' , [BukuController::class , 'storeBuku'])->name('admin.add.buku');
    Route::put('/databuku/update/{id}' , [BukuController::class , 'update'])->name('admin.update.buku');
    Route::delete('/databuku/delete/{id}' , [BukuController::class , 'destroy'])->name('admin.delete.buku');

    //kategori
    Route::get('/kategoribuku' , [KategoriController::class, 'index'])->name('admin.data.kategori');
    Route::post('/kategoribuku/store' , [KategoriController::class, 'store'])->name('admin.add.kategori');
    Route::put('/kategoribuku/update/{id}' , [KategoriController::class, 'update'])->name('admin.update.kategori');
    Route::delete('/kategoribuku/delete/{id}' , [KategoriController::class , 'destroy'])->name('admin.delete.kategori');
    //pesan
    Route::get('/pesan/masuk' , [PesanController::class, 'indexAdminMasuk'])->name('admin.pesan.masuk');
    Route::get('/pesan/terkirim' , [PesanController::class, 'indexAdminterkirim'])->name('admin.pesan.terkirim');
    Route::post('/pesan/kirim', [PesanController::class, 'kirimPesanAdmin'])->name('admin.pesan.kirim');
    Route::post('/pesan/masuk/Ubah_status' , [PesanController::class , 'updateStatusAdmin'])->name('admin.pesan.masuk.update');
    //laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('admin.laporan');
    Route::post('/laporan/tanggal_peminjaman/cetak_pdf', [LaporanController::class, 'cetakPeminjaman'])->name('admin.cetak.peminjaman');
    Route::post('/laporan/tanggal_pengembalian/cetak_pdf', [LaporanController::class, 'cetakPengembalian'])->name('admin.cetak.pengembalian');
    Route::post('/laporan/anggota/cetak', [LaporanController::class, 'cetakPeranggota'])->name('admin.cetak.anggota');

    Route::post('/laporan/excel/tanggal_peminjaman/cetak', [LaporanController::class, 'exportPeminjamanExcel'])->name('admin.cetak.peminjaman.excel');
    Route::post('/laporan/excel/tanggal_pengenbalian/cetak', [LaporanController::class, 'exportPengembalianExcel'])->name('admin.cetak.pengembalian.excel');
    Route::post('/laporan/excel/anggota/cetak', [LaporanController::class, 'exportAnggotaExcel'])->name('admin.cetak.anggota.excel');

});

