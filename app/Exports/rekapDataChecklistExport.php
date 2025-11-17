<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class rekapDataChecklistExport implements FromView
{ 
    protected $data1;
    protected $data2;

    function __construct($data1, $data2 ) {
        $this->data1 = $data1;
        $this->data2 = $data2;
    }


    public function view(): View
    {
        $data1 = $this->data1;
        $data2 = $this->data2;
        
        $checklist = DB::table('checklist_master')
            ->join('checklist', 'checklist.id_checklist_master', '=', 'checklist_master.id')
            ->join('itemsv3rkakl', 'itemsv3rkakl.id', '=', 'checklist_master.id_itemsrkaklakun')
            ->leftjoin('checklist_ppk', 'checklist_ppk.id', '=', 'checklist.id_ppk')
            ->join('checklist_penerima', 'checklist_penerima.id', '=', 'checklist.id_penerima')
            ->join('checklist_kontrak', 'checklist_kontrak.id', '=', 'checklist_master.id_kontrak')
            ->join('checklist_efaktur', 'checklist_efaktur.id', '=', 'checklist.id_efaktur')
            ->join('checklist_bast', 'checklist_bast.id', '=', 'checklist.id_bast')
            ->join('checklist_kwitansi', 'checklist_kwitansi.id', '=', 'checklist.id_kwitansi')
            ->join('checklist_invoice', 'checklist_invoice.id', '=', 'checklist.id_invoice')
            ->join('checklist_suratjalan', 'checklist_suratjalan.id', '=', 'checklist.id_suratjalan')
            ->select(
                'checklist.nama_pekerjaan', 
                'itemsv3rkakl.kode', 
                'itemsv3rkakl.biaya_publish', 
                'checklist_kontrak.identitas', 
                'checklist_kontrak.nomor_kontrak', 
                'checklist_kontrak.tanggal_kontrak', 
                'checklist_kontrak.nominal_kontrak', 
                'checklist_kontrak.durasi_pekerjaan', 
                'checklist_kontrak.tanggal_mulai', 
                'checklist_kontrak.tanggal_selesai', 
                'checklist_master.nama_penyedia', 
                'checklist_bast.nomor_bast', 
                'checklist_bast.tanggal_bast', 
                'checklist_kwitansi.nomor_kwitansi', 
                'checklist_kwitansi.tanggal_kwitansi', 
                'checklist_kwitansi.nominal_kwitansi', 
                'checklist_invoice.nomor_invoice', 
                'checklist_invoice.tanggal_invoice', 
                'checklist_suratjalan.nomor_suratjalan', 
                'checklist_suratjalan.tanggal_suratjalan', 
                'checklist_efaktur.nomor_efaktur', 
                'checklist_efaktur.tanggal_efaktur', 
                'checklist.created_at', 
            )
            ->selectRaw('checklist_master.id AS id_checklistmaster')
            ->selectRaw('checklist.id AS id_checklist')
            ->selectRaw('itemsv3rkakl.id AS id_rkakl')
            ->selectRaw('checklist_ppk.id AS id_ppk')
            ->selectRaw('checklist_penerima.id AS id_penerima')
            ->selectRaw('checklist_kontrak.id AS id_kontrak')
            ->selectRaw('checklist_bast.id AS id_bast')
            ->selectRaw('checklist_kwitansi.id AS id_kwitansi')
            ->selectRaw('checklist_invoice.id AS id_invoice')
            ->selectRaw('checklist_suratjalan.id AS id_suratjalan')
            ->groupBy('checklist.id')
            ->where($data1, 'LIKE', "%{$data2}%")
            ->where('checklist.deleted_at', '=', NULL)
            ->get();

        return view('checklist.laporan.laporan2print', [
            'checklist' => $checklist 
        ]);
    }
    
}
