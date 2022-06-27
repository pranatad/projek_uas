<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ReportPembelianController;
use App\Http\Controllers\ReportPenjualanController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\StokBarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::post('/user/save', [UserController::class, 'save'])->name('saveuser');
Route::put('/user/update', [UserController::class, 'update'])->name('updateuser');
Route::delete('/user/delete', [UserController::class, 'delete'])->name('deleteuser');
Route::get('/user/report', [UserController::class, 'report'])->name('reportuser');
Route::put('/user/reset-password', [UserController::class, 'resetpassword'])->name('resetpassword');
Route::put('/user/update-profile', [UserController::class, 'updateprofile'])->name('updateprofile');
Route::put('/user/change-password', [UserController::class, 'changepassword'])->name('changepassword');

Route::get('/jenis', [JenisController::class, 'index'])->name('jenis');
Route::post('/jenis/save', [JenisController::class, 'save'])->name('savejenis');
Route::put('/jenis/update', [JenisController::class, 'update'])->name('updatejenis');
Route::delete('/jenis/delete', [JenisController::class, 'delete'])->name('deletejenis');
Route::get('/jenis/report', [JenisController::class, 'report'])->name('reportjenis');

Route::get('/satuan', [SatuanController::class, 'index'])->name('satuan');
Route::post('/satuan/save', [SatuanController::class, 'save'])->name('savesatuan');
Route::put('/satuan/update', [SatuanController::class, 'update'])->name('updatesatuan');
Route::delete('/satuan/delete', [SatuanController::class, 'delete'])->name('deletesatuan');
Route::get('/satuan/report', [SatuanController::class, 'report'])->name('reportsatuan');

Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
Route::post('/supplier/save', [SupplierController::class, 'save'])->name('savesupplier');
Route::put('/supplier/update', [SupplierController::class, 'update'])->name('updatesupplier');
Route::delete('/supplier/delete', [SupplierController::class, 'delete'])->name('deletesupplier');
Route::get('/supplier/report', [SupplierController::class, 'report'])->name('reportsupplier');

Route::get('/barang', [BarangController::class, 'index'])->name('barang');
Route::post('/barang/save', [BarangController::class, 'save'])->name('savebarang');
Route::put('/barang/update', [BarangController::class, 'update'])->name('updatebarang');
Route::delete('/barang/delete', [BarangController::class, 'delete'])->name('deletebarang');
Route::get('/barang/report', [BarangController::class, 'report'])->name('reportbarang');

Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian');
Route::get('/pembelian/tambah', [PembelianController::class, 'add'])->name('tambahpembelian');
Route::post('/pembelian/table-detail', [PembelianController::class, 'tabledetail'])->name('tabledetail');
Route::post('/pembelian/save-detail', [PembelianController::class, 'savedetail'])->name('savedetail');
Route::post('/pembelian/delete-detail', [PembelianController::class, 'deletedetail'])->name('deletedetail');
Route::post('/pembelian/save-transaction', [PembelianController::class, 'savetransaction'])->name('savetransaction');
Route::get('/pembelian/faktur/{id}', [PembelianController::class, 'faktur'])->name('fakturpembelian');

Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan');
Route::get('/penjualan/tambah', [PenjualanController::class, 'add'])->name('tambahpenjualan');
Route::post('/penjualan/table-detail', [PenjualanController::class, 'tabledetail'])->name('tabledetailpenjualan');
Route::post('/penjualan/save-detail', [PenjualanController::class, 'savedetail'])->name('savedetailpenjualan');
Route::post('/penjualan/delete-detail', [PenjualanController::class, 'deletedetail'])->name('deletedetailpenjualan');
Route::post('/penjualan/save-transaction', [PenjualanController::class, 'savetransaction'])->name('savetransaction');
Route::get('/penjualan/faktur/{id}', [PenjualanController::class, 'faktur'])->name('fakturpenjualan');

Route::get('/report-stok-barang', [StokBarangController::class, 'index'])->name('report-stok-barang');
Route::get('/report-stok-barang/report', [StokBarangController::class, 'report'])->name('report-stok-barang-action');

Route::get('/report-pembelian', [ReportPembelianController::class, 'index'])->name('report-pembelian');
Route::post('/report-pembelian/report', [ReportPembelianController::class, 'report'])->name('report-pembelian-action');

Route::get('/report-penjualan', [ReportPenjualanController::class, 'index'])->name('report-penjualan');
Route::post('/report-penjualan/report', [ReportPenjualanController::class, 'report'])->name('report-penjualan-action');
