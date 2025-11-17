<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

// Route::get('/login', 'AuthController@login')->name('login');
Route::get('/', 'AuthController@login')->name('login');
Route::get('/regist', 'AuthController@register');
Route::post('/rstore', 'AuthController@store');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

// Route::group(['middleware' => ['auth', 'checkrole:superadmin,bendahara_penerimaan,penjamin']], function(){
Route::group(['middleware' => ['role:superadmin|administrator|bendahara_penerimaan|bendahara_pengeluaran|penjamin']], function(){
    Route::get('/dashboard', 'DashboardController@index');
});

Route::group(['middleware' => ['role:superadmin']], function(){
    // CRUD ROLE
    Route::get('role', 'roleController@index');
    Route::post('role/store', 'roleController@store');
    Route::patch('role/{id}/update', 'roleController@update');
    Route::delete('role/{id}/delete', 'roleController@destroy');
    
    // CRUD PERMISSION
    Route::get('permission', 'permissionController@index');
    Route::post('permission/store', 'permissionController@store');
    Route::patch('permission/{id}/update', 'permissionController@update');
    Route::delete('permission/{id}/delete', 'permissionController@destroy');
    
    // CRUD AKSES ASSIGNROLE
    Route::get('assignrole', 'assignroleController@index');
    Route::get('assignrole/{id}/create', 'assignroleController@create');
    Route::post('assignrole/store', 'assignroleController@store');
    Route::get('assignrole/{id}/edit', 'assignroleController@edit');
    Route::patch('assignrole/{id}/update', 'assignroleController@update');
    
    // CRUD AKSES GIVEPERMISSION
    Route::get('givepermission', 'givepermissionController@index');
    Route::get('givepermission/{id}/create', 'givepermissionController@create');
    Route::post('givepermission/{id}/store', 'givepermissionController@store');
    Route::get('givepermission/{id}/edit', 'givepermissionController@edit');
    Route::patch('givepermission/{id}/update', 'givepermissionController@update');
    
    Route::get('users', 'usersController@index');
    Route::post('users/store', 'usersController@store');
    Route::patch('users/{id}/update', 'usersController@update');
    Route::delete('users/{id}/delete', 'usersController@destroy');
});

Route::group(['middleware' => ['auth', 'checkrole:superadmin,bendahara_penerimaan']], function(){
    // Route::get('/dashboard', 'DashboardController@index')->middleware('auth');
    Route::get('tarif', 'TarifController@index');
    Route::get('tarif/export', 'TarifController@export_excel');
    Route::get('tarif/create', 'TarifController@create');
    Route::post('tarif/store', 'TarifController@store');
    Route::get('tarif/{id}/edit', 'TarifController@edit');
    Route::patch('tarif/{id}/update', 'TarifController@update');
    Route::delete('tarif/{id}/delete', 'TarifController@destroy');
    
    Route::get('akun-in', 'AkuninController@index');
    Route::get('akun-in/create', 'AkuninController@create');
    Route::post('akun-in/store', 'AkuninController@store');
    Route::post('filterselect/{id}', 'AkuninController@filterselect');
    Route::post('filterselect2/{id}', 'AkuninController@filterselect2');
    Route::get('akun-in/{id}/edit', 'AkuninController@edit');
    Route::patch('akun-in/{id}/update', 'AkuninController@update');
    Route::delete('akun-in/{id}/delete', 'AkuninController@destroy');
    
    Route::get('akun-out', 'AkunoutController@index');
    Route::get('akun-out/create', 'AkunoutController@create');
    Route::post('akun-out/store', 'AkunoutController@store');
    Route::get('akun-out/{id}/edit', 'AkunoutController@edit');
    Route::patch('akun-out/{id}/update', 'AkunoutController@update');
    Route::delete('akun-out/{id}/delete', 'AkunoutController@destroy');

    Route::get('report-date', 'reportPemasukanController@date');
    Route::post('report-date/filter', 'reportPemasukanController@filterdate');
    Route::get('report-date/detail/{ul}/{tgl}', 'reportPemasukanController@showdate');
    Route::get('report-date/detail/{ul}/{tgl}/print', 'reportPemasukanController@printdetaildate');
    Route::get('report-date/ul/{date}/print', 'reportPemasukanController@printdateul');
    Route::get('report-date/tin/{date}/print', 'reportPemasukanController@printdatetin');
    
    Route::get('report-range', 'reportPemasukanController@range');
    Route::post('report-range/filter', 'reportPemasukanController@filterrange');
    Route::get('report-range/detail/{ul}/{start}/{end}', 'reportPemasukanController@showrange');
    Route::get('report-range/detail/{ul}/{start}/{end}/print', 'reportPemasukanController@printdetailrange');
    Route::get('report-range/ul/{start}/{end}/print', 'reportPemasukanController@printrangeul');
    Route::get('report-range/tin/{start}/{end}/print', 'reportPemasukanController@printrangetin');
    
    Route::get('report-year', 'reportPemasukanController@year');
    Route::post('report-year/filter', 'reportPemasukanController@filteryear');
    Route::get('report-year/detail/{ul}/{year}', 'reportPemasukanController@showyear');
    Route::get('report-year/detail/{ul}/{year}/print', 'reportPemasukanController@printdetailyear');
    Route::get('report-year/ul/{year}/print', 'reportPemasukanController@printyearul');
    Route::get('report-year/tin/{year}/print', 'reportPemasukanController@printyeartin');
    
    Route::get('bku', 'reportPemasukanController@bku');
    Route::post('bku/filter', 'reportPemasukanController@bkufilter');
    Route::get('bku/{month}/{year}/print', 'reportPemasukanController@bkuprint');
    
});

Route::group(['middleware' => ['role:superadmin|administrator|bendahara_penerimaan|bendahara_pengeluaran|penjamin']], function(){
    Route::get('penjamin', 'penjaminController@index');
    Route::post('penjamin/store', 'penjaminController@store');
    Route::patch('penjamin/{id}/update', 'penjaminController@update');
    Route::delete('penjamin/{id}/delete', 'penjaminController@destroy');

    Route::get('pelayanan', 'pelayananController@index');
    Route::post('pelayanan/store', 'pelayananController@store');
    Route::patch('pelayanan/{id}/update', 'pelayananController@update');
    Route::delete('pelayanan/{id}/delete', 'pelayananController@destroy');
    
    Route::get('pengajuan', 'pengajuanKlaimController@index');
    Route::post('pengajuan/store', 'pengajuanKlaimController@store');
    Route::patch('pengajuan/{id}/update', 'pengajuanKlaimController@update');
    Route::delete('pengajuan/{id}/delete', 'pengajuanKlaimController@destroy');
    
    Route::get('item_pengajuan/{id_pengajuanklaim}', 'Item_pengajuanklaim@index');
    Route::post('item_pengajuan/store', 'Item_pengajuanklaim@store');
    Route::patch('item_pengajuan/{id_pengajuanklaim}/update', 'Item_pengajuanklaim@update');
    Route::delete('item_pengajuan/{id_pengajuanklaim}/{pengajuanklaim_id}/delete', 'Item_pengajuanklaim@destroy');

    Route::get('bap', 'bapController@index');
    Route::get('bap/{id}/edit', 'bapController@edit');
    Route::patch('bap/{id}/update', 'bapController@update');

    Route::get('pencairan', 'pencairanController@index');
    Route::get('pencairan/{id}/edit', 'pencairanController@edit');
    Route::patch('pencairan/{id}/update', 'pencairanController@update');
    Route::post('pencairan/transfer/bendahara_penerimaan', 'pencairanController@store');
    Route::get('pencairan/{id}/kpknl', 'pencairanController@kpknl');
    
    Route::get('penagihan/{id}/show', 'penagihanController@index');
    Route::post('penagihan/{id}/store', 'penagihanController@store');
    Route::patch('penagihan/{id}/{id2}/update', 'penagihanController@update');
    Route::delete('penagihan/{id}/{id2}/delete', 'penagihanController@destroy');

    Route::get('penagihan_umum/{id}/show', 'penagihanUmumController@index');
    Route::post('penagihan_umum/{id}/store', 'penagihanUmumController@store');
    Route::patch('penagihan_umum/{id}/{id2}/update', 'penagihanUmumController@update');
    Route::delete('penagihan_umum/{id}/{id2}/delete', 'penagihanUmumController@destroy');

    Route::get('nonjaminan', 'nonJaminanController@index');
    Route::post('nonjaminan/store', 'nonJaminanController@store');
    Route::patch('nonjaminan/{id}/update', 'nonJaminanController@update');
    Route::delete('nonjaminan/{id}/delete', 'nonJaminanController@destroy');
    Route::patch('nonjaminan/{id}/bayar', 'nonJaminanController@bayar');
    Route::post('nonjaminan/import', 'nonJaminanController@importexcel');
    Route::get('nonjaminan/export', 'nonJaminanController@exportexcel');


    Route::get('report/pengajuan-r', 'reportPenjaminController@pengajuanByRange');
    Route::post('report/pengajuan-r/filter', 'reportPenjaminController@pengajuanByRangefilter');
    Route::get('report/pengajuan-r/{penjamin}/{tgl}/{start}/{end}/{penjamin_id}/{orientasi}/{pelayanan_id}/print', 'reportPenjaminController@pengajuanByRangeprint');
    
    Route::get('report/pengajuan-t', 'reportPenjaminController@pengajuanByTahun');
    Route::post('report/pengajuan-t/filter', 'reportPenjaminController@pengajuanByTahunfilter');
    Route::get('report/pengajuan-t/{penjamin}/{tahun}/{penjamin_id}/{orientasi}/print', 'reportPenjaminController@pengajuanByTahunprint');
    
    Route::get('piutang', 'piutangController@index');
    Route::post('piutang/filter', 'piutangController@filter');
    Route::get('piutang/{star}/{end}/{penjamin_id}/{orientasi}/print', 'piutangController@print');
    
    Route::get('kualitas_piutang', 'kualitaspiutangController@index');
    Route::post('kualitas_piutang/filter', 'kualitaspiutangController@filter');
    Route::get('kualitas_piutang/{date1}/{date2}/{orientasi}/print', 'kualitaspiutangController@print');

    Route::get('mutasipiutang', 'MutasiPiutangController@index');
    Route::post('mutasipiutang/filter', 'MutasiPiutangController@filter');
    Route::get('mutasipiutang/{date1}/{date2}/{orientasi}/print', 'MutasiPiutangController@print');

});


    

Route::get('/gg', function(){
    // ------------------------------------------------------------------------------------------
    // MERELASIKAN USER KEPADA ROLE "USER/MODEL HAS ROLE"
    // $user = \App\User::find(6);
    // $user->assignRole('superadmin');
    // auth()->user()->assignRole('bendahara_penerimaan');
    // ------------------------------------------------------------------------------------------

    // ------------------------------------------------------------------------------------------
    // REMOVE USER YANG BERELASI DENGAN ROLE "USER/MODEL HAS ROLE"
    // $user = \App\User::find(4);
    // $user->removeRole('superadmin');
    // ------------------------------------------------------------------------------------------
    
    // ------------------------------------------------------------------------------------------
    // MEMBERIKAN AKSES PERMISSION KEPADA ROLE "ROLE HAS PERMISSIONS"
    // $role = Role::find(1);
    // $role->givePermissionTo('Manage All User Plus Role Permission');
    // ------------------------------------------------------------------------------------------

    // ------------------------------------------------------------------------------------------
    // REMOVE AKSES PERMISSION KEPADA ROLE "ROLE HAS PERMISSIONS"
    // $role = Role::find(1);
    // $role->revokePermissionTo('Manage Data Penerimaan & Pengeluaran Bendahara Penerimaan');
    // ------------------------------------------------------------------------------------------ 

    // $user = \App\User::with('roles')->get();
    // $user->assignRole('superadmin');

    // auth()->user()->assignRole('superadmin');

    $role = Role::find('1');
    dd($role->hasPermissionTo('Manage Tindakan'));
    // $get = $role->getAllPermissions();

    // return view('testing.index', [
    //     'Mget' => $get
    // ]);
});

