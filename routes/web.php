<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardPartnerController;
use App\Http\Controllers\DashboardSellerController;
use App\Http\Controllers\HomeBuyerController;
use Illuminate\Support\Facades\Route;

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


Route::middleware(['guest'])->group(function (){
    Route::get('/', function () {
        return view('landing1',['title'=>'Blooms Store']);
    })->name('landing1');
    
    Route::get('/login/{type}', [AuthController::class,'login'])->name('login');
    
    Route::get('/register/{type}', [AuthController::class,'register']);

    Route::get('/login/{type}/lupaPassword', [AuthController::class,'lupaPassword']);

    Route::post('/login/{type}/lupaPassword/reset', [AuthController::class,'prosesLupaPassword']);
    
    Route::post('/prosesRegister',[AuthController::class,'prosesRegister']);
    
    Route::get('/detailPenjual/{id}', [AuthController::class,'detailPenjual']);
    
    Route::get('/detailPartner/{id}', [AuthController::class,'detailPartner']);
    
    Route::post('/prosesLogin',[AuthController::class,'prosesLogin']);

    Route::post('/prosesPenjual',[AuthController::class,'prosesPenjual']);

    Route::post('/prosesPartner',[AuthController::class,'prosesPartner']);

});

// Pembeli
Route::middleware(['auth','user_role:pembeli'])->group(function (){
    Route::get('/home',[HomeBuyerController::class,'home'])->name('home');

    Route::get('/profilePembeli',[HomeBuyerController::class,'profile']);

    Route::get('/profilePembeli/edit',[HomeBuyerController::class,'editProfile']);

    Route::post('/profilePembeli/prosesEdit',[HomeBuyerController::class,'prosesEditProfile']);

    Route::get('/resetPasswordPembeli',[HomeBuyerController::class,'resetPassword']);

    Route::post('/proses/resetPasswordPembeli',[HomeBuyerController::class,'prosesReset']);

    Route::get('/alamat',[HomeBuyerController::class,'alamat']);

    Route::get('/alamat/tambah',[HomeBuyerController::class,'tambahAlamat']);

    Route::post('/alamat/tambah/proses',[HomeBuyerController::class,'prosesTambahAlamat']);

    Route::get('/alamat/edit/{id}',[HomeBuyerController::class,'editAlamat']);

    Route::post('/alamat/edit/proses',[HomeBuyerController::class,'prosesEditAlamat']);

    Route::post('/alamat/hapus/{id}',[HomeBuyerController::class,'hapusAlamat']);

    // Pembelian
    Route::post('/caribarang',[HomeBuyerController::class,'cariBarang']);

    Route::get('/detailbarang/{id}',[HomeBuyerController::class,'detailBarang']);

    Route::post('/detailBarang/buatPesanan',[HomeBuyerController::class,'buatPesanan']);

    // Transaksi
    Route::get('/transaksi',[HomeBuyerController::class,'transaksi']);

    Route::get('/transaksi/detail/{id}',[HomeBuyerController::class,'detailTransaksi']);
    
    Route::get('/transaksi/selesai/{id}',[HomeBuyerController::class,'selesaiTransaksi']);

    Route::post('/transaksi/batalkan/{id}',[HomeBuyerController::class,'batalTransaksi']);

    Route::post('/bayar/{id}',[HomeBuyerController::class,'bayarTransaksi']);

    // Riwayat
    Route::get('/riwayat',[HomeBuyerController::class,'riwayat']);

    Route::get('/riwayat/detail/{id}',[HomeBuyerController::class,'detailRiwayat']);
});

// Penjual
Route::middleware(['auth','user_role:penjual'])->group(function (){
    //Barang
    Route::get('/dashboardPenjual',[DashboardSellerController::class,'dashboardPenjual']);
    
    Route::get('/dashboardPenjual/barang',[DashboardSellerController::class,'barang'])->name('barang');
    
    Route::get('/dashboardPenjual/barang/tambah',[DashboardSellerController::class,'tambah']);
    
    Route::post('/tambahBarang',[DashboardSellerController::class,'tambahBarang']);
    
    Route::get('/dashboardPenjual/barang/edit/{id}',[DashboardSellerController::class,'edit']);
    
    Route::post('/editBarang/{id}',[DashboardSellerController::class,'editBarang']);
    
    Route::post('/hapusBarang/{id}',[DashboardSellerController::class,'hapusBarang']);

    Route::get('/dashboardPenjual/barang/Arsip',[DashboardSellerController::class,'arsipBarang']);

    Route::post('/pulihkanBarang/{id}',[DashboardSellerController::class,'pulihkanBarang']);

    Route::get('/profilePenjual',[DashboardSellerController::class,'profile']);

    Route::get('/profilePenjual/edit',[DashboardSellerController::class,'editProfile']);

    Route::post('/profilePenjual/prosesEdit',[DashboardSellerController::class,'prosesEditProfile']);

    Route::get('/resetPasswordPenjual',[DashboardSellerController::class,'resetPassword']);

    Route::post('/proses/resetPasswordPenjual',[DashboardSellerController::class,'prosesReset']);

    //Pengiriman
    Route::get('/dashboardPenjual/pengiriman',[DashboardSellerController::class,'pengiriman'])->name('pengiriman');
    
    Route::get('/dashboardPenjual/pengiriman/tambahBiaya',[DashboardSellerController::class,'tambahBiaya']);

    Route::post('/tambahBiayaPengiriman',[DashboardSellerController::class,'tambahBiayaPengiriman']);

    Route::get('/dashboardPenjual/pengiriman/edit/{id}',[DashboardSellerController::class,'editBiaya']);
    
    Route::post('/editBiayaPengiriman',[DashboardSellerController::class,'editBiayaPengiriman']);
    
    Route::post('/hapusBiaya/{id}',[DashboardSellerController::class,'hapusBiaya']);

    Route::get('/dashboardPenjual/transaksi/detail/{id}',[DashboardSellerController::class,'detailTransaksi']);

    Route::post('/konfirmasiTransaksi/{id}',[DashboardSellerController::class,'konfirmasiTransaksi']);

    // Pencatatan
    Route::get('/dashboardPenjual/pencatatan',[DashboardSellerController::class,'pencatatan']);

    Route::get('/dashboardPenjual/pencatatan/tambah',[DashboardSellerController::class,'tambahCatatan']);

    Route::post('/tambahCatatan',[DashboardSellerController::class,'prosesTambahCatatan']);

    Route::get('/dashboardPenjual/pencatatan/edit/{id}',[DashboardSellerController::class,'editCatatan']);

    Route::post('/editCatatan',[DashboardSellerController::class,'prosesEditCatatan']);

    Route::post('/hapusCatatan/{id}',[DashboardSellerController::class,'hapusCatatan']);

    // Penarikan
    Route::get('/dashboardPenjual/penarikan',[DashboardSellerController::class,'penarikan']);

    Route::get('/dashboardPenjual/penarikan/tambah',[DashboardSellerController::class,'tambahRekening']);

    Route::post('/tambahRekening',[DashboardSellerController::class,'prosesTambahRekening']);

    Route::get('/dashboardPenjual/penarikan/edit/{id}',[DashboardSellerController::class,'editRekening']);

    Route::post('/editRekening',[DashboardSellerController::class,'prosesEditRekening']);

    Route::post('/hapusRekening/{id}',[DashboardSellerController::class,'hapusRekening']);

    // Riwayat
    Route::get('/dashboardPenjual/riwayat',[DashboardSellerController::class,'riwayat']);

    Route::get('/dashboardPenjual/riwayat/detail/{id}',[DashboardSellerController::class,'detailRiwayat']);
});

// Partner
Route::middleware(['auth','user_role:partner'])->group(function (){
    Route::get('/dashboardPartner',[DashboardPartnerController::class,'dashboardPartner']);

    Route::get('/profilePartner',[DashboardPartnerController::class,'profile']);

    Route::get('/profilePartner/edit',[DashboardPartnerController::class,'editProfile']);

    Route::post('/profilePartner/prosesEdit',[DashboardPartnerController::class,'prosesEditProfile']);

    Route::get('/resetPasswordPartner',[DashboardPartnerController::class,'resetPassword']);

    Route::post('/proses/resetPasswordPartner',[DashboardPartnerController::class,'prosesReset']);
});

// Admin
Route::middleware(['auth','user_role:admin'])->group(function (){
    Route::get('/dashboardAdmin',[DashboardAdminController::class,'dashboardAdmin']);

    Route::get('/profileAdmin',[DashboardAdminController::class,'profile']);

    Route::get('/profileAdmin/edit',[DashboardAdminController::class,'editProfile']);

    Route::post('/profileAdmin/prosesEdit',[DashboardAdminController::class,'prosesEditProfile']);

    Route::get('/resetPasswordAdmin',[DashboardAdminController::class,'resetPassword']);

    Route::post('/proses/resetPasswordAdmin',[DashboardAdminController::class,'prosesReset']);

    // Transaksi
    Route::get('/dashboardAdmin/transaksi',[DashboardAdminController::class,'transaksi']);

    Route::get('/dashboardAdmin/transaksi/{id}',[DashboardAdminController::class,'detailTransaksi']);

    Route::post('/dashboardAdmin/transaksi/simpan',[DashboardAdminController::class,'simpanTransaksi']);

    // Pembayaran
    Route::get('/dashboardAdmin/pembayaran',[DashboardAdminController::class,'pembayaran']);

    Route::get('/dashboardAdmin/pembayaran/tambah',[DashboardAdminController::class,'tambahPembayaran']);

    Route::post('/tambahMetodePembayaran',[DashboardAdminController::class,'prosesTambahPembayaran']);

    Route::get('/dashboardAdmin/pembayaran/edit/{id}',[DashboardAdminController::class,'editPembayaran']);

    Route::post('/editMetodePembayaran',[DashboardAdminController::class,'prosesEditPembayaran']);

    Route::post('/hapusPembayaran/{id}',[DashboardAdminController::class,'hapusPembayaran']);

    // Riwayat
    Route::get('/dashboardAdmin/riwayat',[DashboardAdminController::class,'riwayat']);

    Route::get('/dashboardAdmin/riwayat/detail/{id}',[DashboardAdminController::class,'detailRiwayat']);
});

Route::get('/logout',[AuthController::class,'prosesLogout'])->middleware('auth');