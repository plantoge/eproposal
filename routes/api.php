<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('get-akun-rkakl', 'apiAnggaranController@getAkun');
Route::get('get-master-rkakl', 'apiAnggaranController@master');
Route::get('get-master-rkakl-1/{idmaster}', 'apiAnggaranController@get1');
Route::get('get-master-rkakl-2/{idmaster}/{idlevel}', 'apiAnggaranController@get2');
Route::get('get-master-rkakl-3/{idmaster}/{idlevel}/{urutanhead}', 'apiAnggaranController@get3');


Route::get('get-kode-transaksi-penerimaan', 'apiPenerimaanController@getKodeTransaksi');
Route::get('get-unit-tindakan', 'apiPenerimaanController@getUnitLayananTindakan');
Route::post('post-piutang-penerimaan', 'ApiPenerimaanController@store');