<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class rekapitulasiHutangExport implements FromView
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

        $data = DB::table('checklist_master')
            ->join('checklist', 'checklist.id_checklist_master', '=', 'checklist_master.id')
            ->leftJoin('spby', 'spby.id_checklist', '=', 'checklist.id')
            ->leftJoin('hutang', 'hutang.id_checklist', '=', 'checklist.id')
            ->leftJoin('coa', 'coa.id', '=', 'hutang.id_coa')
            ->join('checklist_kwitansi', 'checklist_kwitansi.id', '=', 'checklist.id_kwitansi')
            ->join('checklist_kontrak', 'checklist_kontrak.id', '=', 'checklist_master.id_kontrak')
            ->select(
                'checklist_master.created_at', 
                'checklist_master.nominal_keep', 
                'checklist_kwitansi.nomor_kwitansi', 
                'checklist_kwitansi.tanggal_kwitansi', 
                'checklist_kwitansi.nominal_kwitansi', 
                'checklist_kontrak.tanggal_kontrak', 
                'checklist_kontrak.nomor_kontrak', 
                'checklist_kontrak.nominal_kontrak', 
                'checklist_kontrak.tanggal_mulai', 
                'checklist_kontrak.tanggal_selesai', 
                'checklist.nama_pekerjaan', 
                'checklist_master.nama_penyedia', 
                'checklist.jenis_pekerjaan', 
                'checklist.payment_by',
                'checklist.nomor_checklist', 
                'checklist.mulai_acc', 
                'checklist.acc2', 
                'checklist.acc3', 
                'checklist.acc4', 
                'checklist.ada_spby',
                'checklist.id_bast', 
                'checklist.id_efaktur', 
                'checklist.id_invoice', 
                'coa.*', 
                'spby.nominal_spby', 
                'spby.status_realisasi', 
            )
            ->selectRaw('checklist_master.id AS id_checklistmaster')
            ->selectRaw('checklist.id AS id_checklist')
            ->selectRaw('checklist_kwitansi.id AS id_kwitansi')
            ->selectRaw('checklist.created_at AS tanggal_input')
            ->selectRaw('spby.created_at AS tanggal_pembayaran')
            ->groupBy('checklist.id')
            ->whereBetween('checklist.created_at', [$data1, $data2])
            ->where([
                ['checklist.deleted_at', '=', NULL],
                ['checklist.acc1', '=', 1],
                ['checklist.acc2', '=', 1],
                ['checklist.acc3', '=', 1],
                ['checklist.acc4', '=', 1],
            ])
            // ->whereIn('spby.data_ini', ['tagihanManual', 'tagihan/checklist'])
            ->get();
        
        $data2 = DB::table('hutang_manual')
            ->leftJoin('coa', 'coa.id', '=', 'hutang_manual.id_coa')
            ->select(
                'hutang_manual.*',
                'coa.*', 
            )
            ->selectRaw('coa.id AS id_coa')
            ->selectRaw('hutang_manual.id AS id_hutang_manual')
            ->selectRaw('hutang_manual.created_at AS tanggal_pembayaran')
            ->groupBy('hutang_manual.id')
            ->whereBetween('hutang_manual.created_at', [$data1, $data2])
            ->where('hutang_manual.deleted_at', '=', NULL)
            ->get();
            // dd ($data);

        return view('hutang.laporanhutang.rekapitulasihutang', [
            'data' => $data, 
            'data2' => $data2, 
        ]);
    }
    
}
