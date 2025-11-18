<?php

namespace App\Http\Controllers\module;

use App\Http\Controllers\Controller;
use App\Model\infokontak_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class panelController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasrole('visitor') == true ){
            return redirect(URL('pengajuan-proposal'));
        }

        $informasi = infokontak_model::latest()->first();

        return view('module/admin/panelDashboard', [
            'informasi' => $informasi
        ]);
    }

    public function create()
    {
        //
    }

    public function store_informasi(Request $request)
    {
        $update = infokontak_model::latest()->first();
        $update->deskripsi_biaya = $request->deskripsi_biaya;
        $update->telepon = $request->telepon;
        $update->fax = $request->fax;
        $update->callcenter = $request->callcenter;
        $update->hotline = $request->hotline;
        $update->email = $request->email;
        $update->facebook = $request->facebook;
        $update->instagram = $request->instagram;
        $update->twitter = $request->twitter;
        $update->whatsapp = $request->whatsapp;
        $update->cp_kaji_etik = $request->cp_kaji_etik;
        $update->wa_kaji_etik = $request->wa_kaji_etik;
        $update->cp_pks = $request->cp_pks;
        $update->wa_pks = $request->wa_pks;
        $update->cp_mta = $request->cp_mta;
        $update->wa_mta = $request->wa_mta;
        $update->cp_kerahasiaan = $request->cp_kerahasiaan;
        $update->wa_kerahasiaan = $request->wa_kerahasiaan;
        $update->pemilik_rekening = $request->pemilik_rekening;
        $update->nomor_rekening = $request->nomor_rekening;
        $update->nama_bank = $request->nama_bank;
        
        // cek apakah ada data yang diubah
        if($update->isDirty() == true){
            
            $update->Save();
            
            $responseData = [
                'status_code' => 200,
                'message' => 'Data berhasil disimpan.',
                'additionalData' => 'Nilai tambahan jika diperlukan.'
            ];
        }else if($update->isDirty() == false){
            $responseData = [
                'status_code' => 200,
                'message' => 'Data tidak ada yang di ubah.',
                'additionalData' => 'Nilai tambahan jika diperlukan.'
            ];
        }

        return response()->json($responseData, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
