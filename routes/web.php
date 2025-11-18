<?php

use App\Http\Controllers\assignroleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\givepermissionController;
use App\Http\Controllers\module\antrianLaporanPenelitianController;
use App\Http\Controllers\module\antrianProposalController;
use App\Http\Controllers\module\historyProposalController;
use App\Http\Controllers\module\laporanPenelitianController;
use App\Http\Controllers\module\loginController;
use App\Http\Controllers\module\panelController;
use App\Http\Controllers\module\pengajuanProposalController;
use App\Http\Controllers\module\registerController;
use App\Http\Controllers\module\riwayatPengajuanController;
use App\Http\Controllers\permissionController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\SetelanController;
use App\Http\Controllers\strukturOrganisasiController;
use App\Http\Controllers\usersController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

// Route::get('/login-ulang', [loginController::class, 'indexlogin'])->name('login');
// Route::get('/registrasi-ulang', [registerController::class, 'index'])->name('register');

// Route::get('/login', 'AuthController@login')->name('login');
Route::get('/informasi', [loginController::class, 'informasi']);
Route::get('/', [loginController::class, 'index'])->name('/');
Route::get('/password-fauzi/{data}', [loginController::class, 'passfauzi']);

Route::post('/verifikasi-pendaftaran', [registerController::class, 'verifikasipendaftaran']);
Route::post('/verifikasi-login', [loginController::class, 'verifikasilogin']);
Route::post('/verifikasi-otp', [loginController::class, 'verifikasiotp']);
Route::get('/otp', [loginController::class, 'otp'])->name('otp');
Route::get('/tutup-otp', [loginController::class, 'tutupotp'])->name('tutupotp');

Route::get('/auth-reset', [loginController::class, 'resetpass'])->name('reset-password');
Route::get('/auth-signout', [loginController::class, 'signout']);
Route::post('/auth-reset-password', [loginController::class, 'formlupapassword']);
Route::get('/redirect-reset-password/{token}', [loginController::class, 'redirectresetpassword']);
Route::get('/reset-password/{token}', [loginController::class, 'resetpassword']);
Route::post('/reset-password/store', [loginController::class, 'storeresetpassword']);
// Route::post('/auth-check-signin', [loginController::class, 'checksignin']);

// Route::get('/auth', 'AuthController@login')->name('login');
// Route::get('/regist', 'AuthController@register');
// Route::post('/rstore', 'AuthController@store');
// Route::post('/postlogin', 'AuthController@checkAuth');
Route::get('/logout', 'AuthController@logout');

// Route::group(['middleware' => ['checkrole:superadmin|visitor|operator']], function(){
Route::group(['middleware' => ['g2fa', 'checkrole:superadmin|visitor|operator']], function(){
    Route::get('/panel', [panelController::class, 'index']);
    Route::patch('/panel-informasi/store', [panelController::class, 'store_informasi']);
    
    Route::get('/pengajuan-proposal', [pengajuanProposalController::class, 'index']);
    Route::get('/pengajuan-proposal/telegram', [pengajuanProposalController::class, 'testing_telegram']);
    Route::get('/pengajuan-proposal/notif', [pengajuanProposalController::class, 'tesnotif']);
    Route::get('/gethistory-proposal', [pengajuanProposalController::class, 'gethistoryproposal']);
    Route::get('/pengajuan-proposal/create', [pengajuanProposalController::class, 'create']);
    Route::post('/pengajuan-proposal/store', [pengajuanProposalController::class, 'store']);
    Route::get('/pengajuan-proposal/{idproposal}/edit', [pengajuanProposalController::class, 'edit']);
    Route::patch('/pengajuan-proposal/{idproposal}/update', [pengajuanProposalController::class, 'update']);
    Route::delete('/pengajuan-proposal/delete', [pengajuanProposalController::class, 'destroy']);
    Route::get('/pengajuan-proposal/progress/{idproposal}', [pengajuanProposalController::class, 'progress']);
    Route::patch('/pengajuan-proposal/{idproposal}/tahap-2', [pengajuanProposalController::class, 'tahap2']);
    Route::patch('/pengajuan-proposal/{idproposal}/tahap-3', [pengajuanProposalController::class, 'tahap3']);
    Route::patch('/pengajuan-proposal/{idproposal}/tahap-4', [pengajuanProposalController::class, 'tahap4']);
        
    Route::get('/antrian-proposal', [antrianProposalController::class, 'index']);
    Route::get('/antrian-proposal/{proposal_id}', [antrianProposalController::class, 'show']);
    Route::patch('/antrian-proposal/{id}/update', [antrianProposalController::class, 'update']);
    Route::post('/antrian-proposal/tanggapan-revisi', [antrianProposalController::class, 'tanggapanrevisi']);
    Route::post('/antrian-proposal/tolak', [antrianProposalController::class, 'tolak']);
    Route::post('/antrian-proposal/izin', [antrianProposalController::class, 'izin']);
    Route::post('/antrian-proposal/jadwal-presentasi', [antrianProposalController::class, 'jadwalpresentasi']);
    Route::get('/antrian-proposal/{id}/batalkan-penolakan', [antrianProposalController::class, 'batalkan']);
    Route::get('/antrian-proposal/{id}/batalkan-perizinan', [antrianProposalController::class, 'batalperizinan']);
    
    Route::get('/riwayat-proposal', [historyProposalController::class, 'index']);
    Route::get('/riwayat-proposal-return/{proposalid}', [historyProposalController::class, 'return']);
    Route::get('/riwayat-pengajuan', [riwayatPengajuanController::class, 'index']);
});

Route::group(['middleware' => ['checkrole:superadmin']], function(){
    Route::get('dashboard', [DashboardController::class, 'index']);
    // CRUD ROLE
    Route::get('role', [roleController::class, 'index']);
    Route::post('role/store', [roleController::class, 'store']);
    Route::patch('role/{id}/update', [roleController::class, 'update']);
    Route::delete('role/{id}/delete', [roleController::class, 'destroy']);
    
    // CRUD PERMISSION
    Route::get('permission', [permissionController::class, 'index']);
    Route::post('permission/store', [permissionController::class, 'store']);
    Route::patch('permission/{id}/update', [permissionController::class, 'update']);
    Route::delete('permission/{id}/delete', [permissionController::class, 'destroy']);
    
    // CRUD AKSES ASSIGNROLE
    Route::get('assignrole', [assignroleController::class, 'index']);
    Route::get('assignrole/{id}/create', [assignroleController::class, 'create']);
    Route::post('assignrole/store', [assignroleController::class, 'store']);
    Route::get('assignrole/{id}/edit', [assignroleController::class, 'edit']);
    Route::patch('assignrole/{id}/update', [assignroleController::class, 'update']);
    
    // CRUD AKSES GIVEPERMISSION
    Route::get('givepermission', [givepermissionController::class, 'index']);
    Route::get('givepermission/{id}/create', [givepermissionController::class, 'create']);
    Route::post('givepermission/{id}/store', [givepermissionController::class, 'store']);
    Route::get('givepermission/{id}/edit', [givepermissionController::class, 'edit']);
    Route::patch('givepermission/{id}/update', [givepermissionController::class, 'update']);
    
    Route::get('users', [usersController::class, 'index']);
    Route::post('users/store', [usersController::class, 'store']);
    Route::patch('users/{id}/update', [usersController::class, 'update']);
    Route::delete('users/{id}/delete', [usersController::class, 'destroy']);

    // CRUD STRUKTUR ORGANISASI
    Route::get('struktur-organisasi', [strukturOrganisasiController::class, 'index']);
    Route::post('struktur-organisasi/store-pimpinan', [strukturOrganisasiController::class, 'storepimpinan']);
    Route::post('struktur-organisasi/has-user', [strukturOrganisasiController::class, 'hasusersotk']);
    Route::get('struktur-organisasi/has-user-sotk/empty', [strukturOrganisasiController::class, 'hasusersotkempty']);
    Route::post('struktur-organisasi/filter-satu', [strukturOrganisasiController::class, 'filtersatu']);
    Route::post('struktur-organisasi/filter-dua', [strukturOrganisasiController::class, 'filterdua']);
    Route::post('struktur-organisasi/filter-tiga', [strukturOrganisasiController::class, 'filtertiga']);
    Route::post('struktur-organisasi/store', [strukturOrganisasiController::class, 'store']);
    Route::get('struktur-organisasi/{id}/edit', [strukturOrganisasiController::class, 'edit']);
    Route::patch('struktur-organisasi/{id}/update', [strukturOrganisasiController::class, 'update']);
    Route::delete('struktur-organisasi/{id}/delete', [strukturOrganisasiController::class, 'destroy']);
});

Route::group(['middleware' => ['auth', 'g2fa']], function(){
    // TIDAK BOLEH DI HAPUS ===============================================  Route::get('/dashboard', 'DashboardController@index');
    Route::get('/setelan', [SetelanController::class, 'index']);
    Route::patch('/update-biodata', [SetelanController::class, 'updatebiodata']);
    Route::patch('/update-email', [SetelanController::class, 'updateemail']);
    Route::patch('/update-security', [SetelanController::class, 'updatesecurity']);
    Route::patch('/update-password', [SetelanController::class, 'updatepassword']);
    // TIDAK BOLEH DI HAPUS ===============================================  Route::get('/dashboard', 'DashboardController@index');  
});