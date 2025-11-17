<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpseclib\Net\SFTP;

class pdfController extends Controller
{
    public function showpdf(){
        // Inisialisasi koneksi SFTP
        $sftp = new SFTP('192.168.1.128', 39615);
        if (!$sftp->login('apkKeuangan', 'aplikasiKeuangan123')) {
            // Penanganan kesalahan jika gagal masuk
            abort(500, 'Gagal masuk ke server NAS');
        }

        // Path file PDF di server NAS
        $pdfPath =  env('SFTP_ROOT') .'/'. env('SFTP_DIRECTORY') .'/tagihan_checklist/bast/259FurYEiWgTY2LE3yEhJ2PbJNjgB5DvUzeuUBGQ.pdf';

        // Baca isi file PDF menggunakan SFTP
        $pdfContent = $sftp->get($pdfPath);

        // Tampilkan file PDF di browser
        return response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="1Bgt0zetl0sXJuXKSmJrFPr0UQz41mYNRGwtLOEo.pdf"',
        ]);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
