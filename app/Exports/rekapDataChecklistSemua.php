<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class rekapDataChecklistSemua implements FromView
{
    // protected $data1;
    // protected $data2;

    // function __construct($data1, $data2 ) {
    //     $this->data1 = $data1;
    //     $this->data2 = $data2;
    // }


    public function view(): View
    {
        // $data1 = $this->data1;
        // $data2 = $this->data2;
        
        $checklist = DB::table('checklist_master')
            ->join('checklist', 'checklist.id_checklist_master', '=', 'checklist_master.id')
            ->leftjoin('checklist_ppk', 'checklist_ppk.id', '=', 'checklist.id_ppk')
            ->join('checklist_penerima', 'checklist_penerima.id', '=', 'checklist.id_penerima')
            ->join('checklist_kontrak', 'checklist_kontrak.id', '=', 'checklist_master.id_kontrak')
            ->join('checklist_kwitansi', 'checklist_kwitansi.id', '=', 'checklist.id_kwitansi')
            ->select(
                'checklist.nomor_checklist', 
                'checklist.nama_pekerjaan', 
                'checklist.terminke', 
                'checklist_kontrak.identitas', 
                'checklist_kontrak.nomor_kontrak', 
                'checklist_kontrak.tanggal_kontrak', 
                'checklist_kontrak.nominal_kontrak', 
                'checklist_kontrak.durasi_pekerjaan', 
                'checklist_kontrak.tanggal_mulai', 
                'checklist_kontrak.tanggal_selesai', 
                'checklist_master.nama_penyedia', 
                'checklist_kwitansi.nomor_kwitansi', 
                'checklist_kwitansi.tanggal_kwitansi', 
                'checklist_kwitansi.nominal_kwitansi', 
                'checklist.created_at', 
                'checklist.id_bast', 
                'checklist.id_efaktur', 
                'checklist.id_invoice', 
                'checklist.id_suratjalan', 
                'checklist.id', 
            )
            ->groupBy('checklist.id')
            ->where('checklist.deleted_at', '=', NULL)
            ->get();

        return view('checklist.laporan.laporan2print', [
            'checklist' => $checklist 
        ]);
    }
}
