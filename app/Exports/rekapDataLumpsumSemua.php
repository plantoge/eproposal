<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Auth;

class rekapDataLumpsumSemua implements FromView
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
            ->join('itemsv3rkakl', 'itemsv3rkakl.id', '=', 'checklist_master.id_itemsrkaklakun')
            ->join('checklist_kontrak', 'checklist_kontrak.id', '=', 'checklist_master.id_kontrak')
            ->join('checklist_kwitansi', 'checklist_kwitansi.id', '=', 'checklist.id_kwitansi')
            ->join('checklist_penerima', 'checklist_penerima.id', '=', 'checklist.id_penerima')
            ->leftjoin('spby', 'spby.id_checklist', '=', 'checklist.id')
            ->select( 'checklist.nomor_checklist', 'itemsv3rkakl.kode', 'itemsv3rkakl.deskripsi', 'checklist.nama_pekerjaan', 'checklist.ada_spby', 'checklist.mulai_acc',  'checklist.acc1',  'checklist.acc2',  'checklist.acc3',  'checklist.acc4', 'checklist.ada_spby', 'checklist_master.nama_penyedia',  'checklist_master.metode_pembayaran',  'checklist_kontrak.nomor_kontrak',  'checklist_kontrak.nominal_kontrak', 'checklist_kwitansi.nominal_kwitansi', 'spby.tanggal_transaksi')
            ->selectRaw('checklist_master.id AS id_checklistmaster')
            ->selectRaw('checklist.id AS id_checklist')
            ->selectRaw('itemsv3rkakl.id AS id_rkakl')
            ->selectRaw('checklist_kontrak.id AS id_kontrak')
            ->groupBy('checklist.id')
            ->where('checklist.jenis_data', '=', 'nonapproval')
            ->where('checklist.mulai_acc', '=', 1)
            ->where('checklist.payment_by', '=', 'LS')
            ->where('checklist_penerima.penerima', '=', Auth::user()->id)
            ->where('checklist.deleted_at', '=', NULL)
            ->get();

            // dd($checklist);
        return view('bendahara_pengeluaran.lumpsum.laporan', [
            'checklist' => $checklist 
        ]);
    }
}
