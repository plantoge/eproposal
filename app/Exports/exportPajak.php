<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class exportPajak implements FromView
{
    protected $metode;
    protected $tahun;

    function __construct($metode, $tahun) {
        $this->metode = $metode;
        $this->tahun = $tahun;
    }

    public function view(): View
    {
        
        if($this->metode == 'LS'){
            $data = DB::table('checklist_master')
                ->join('checklist', 'checklist.id_checklist_master', '=', 'checklist_master.id')
                ->join('checklist_kwitansi', 'checklist_kwitansi.id', '=', 'checklist.id_kwitansi')
                ->join('checklist_kontrak', 'checklist_kontrak.id', '=', 'checklist_master.id_kontrak')
                ->leftjoin('spby', 'checklist.id', '=', 'spby.id_checklist')
                ->leftjoin('ppn', 'ppn.id_spby', '=', 'spby.id')
                ->leftjoin('pph21', 'pph21.id_spby', '=', 'spby.id')
                ->leftjoin('pph22', 'pph22.id_spby', '=', 'spby.id')
                ->leftjoin('pph23', 'pph23.id_spby', '=', 'spby.id')
                ->leftjoin('setoranlain', 'setoranlain.id_spby', '=', 'spby.id')
                ->leftjoin('pasal4ayat2', 'pasal4ayat2.id_spby', '=', 'spby.id')
                ->select(
                    'checklist.ada_spby', 
                    'checklist.tanggal_input', 
                    'spby.jenis_anggaran', 
                    'checklist_master.nama_penyedia', 
                    'checklist_master.npwp', 
                    'ppn.nominal_ppn', 
                    'pph21.nominal_pph21', 
                    'pph22.nominal_pph22', 
                    'pph23.nominal_pph23', 
                    'setoranlain.nominal_setoranlain', 
                    'pasal4ayat2.nominal_pasal4ayat2', 
                    'spby.created_at', 
                    'spby.desk_pengeluaran', 
                    'spby.status_realisasi', 
                    'checklist_kwitansi.nominal_kwitansi', 
                    'checklist.nomor_checklist', 
                    'checklist.kode_billing', 
                    'checklist.no_spm', 
                    'checklist.ntpn', 
                    'checklist.ntb', 
                    'checklist.kode_jenispajak', 
                    'checklist.kode_jenissetoran', 
                    'checklist.no_sp2d', 
                    'checklist.id_efaktur', 
                )
                ->selectRaw('checklist.id AS id_checklist, spby.tanggal_transaksi AS tanggal_setor_pajak')
                ->groupByRaw('ppn.id_spby')
                ->where('checklist.payment_by', '=', 'LS')
                ->where('spby.status_realisasi', '=', 1)
                ->get();

            return view('pajak/laporan-pajak/excelPajakLS', [
                'data' => $data,
                'metode' => $this->metode,
                'tahun' => $this->tahun,
            ]);

        }else{
            
            $data = DB::table('checklist_master')
                ->join('checklist', 'checklist.id_checklist_master', '=', 'checklist_master.id')
                ->join('checklist_kwitansi', 'checklist_kwitansi.id', '=', 'checklist.id_kwitansi')
                ->join('checklist_kontrak', 'checklist_kontrak.id', '=', 'checklist_master.id_kontrak')
                ->leftjoin('spby', 'checklist.id', '=', 'spby.id_checklist')
                ->leftjoin('ppn', 'ppn.id_spby', '=', 'spby.id')
                ->leftjoin('pph21', 'pph21.id_spby', '=', 'spby.id')
                ->leftjoin('pph22', 'pph22.id_spby', '=', 'spby.id')
                ->leftjoin('pph23', 'pph23.id_spby', '=', 'spby.id')
                ->leftjoin('setoranlain', 'setoranlain.id_spby', '=', 'spby.id')
                ->leftjoin('pasal4ayat2', 'pasal4ayat2.id_spby', '=', 'spby.id')
                ->select(
                    'checklist.ada_spby', 
                    'checklist.tanggal_input', 
                    'spby.jenis_anggaran', 
                    'checklist_master.nama_penyedia', 
                    'checklist_master.npwp', 
                    'ppn.nominal_ppn', 
                    'pph21.nominal_pph21', 
                    'pph22.nominal_pph22', 
                    'pph23.nominal_pph23', 
                    'setoranlain.nominal_setoranlain', 
                    'pasal4ayat2.nominal_pasal4ayat2', 
                    'spby.created_at', 
                    'spby.desk_pengeluaran', 
                    'spby.status_realisasi', 
                    'checklist_kwitansi.nominal_kwitansi', 
                    'checklist.nomor_checklist', 
                    'checklist.kode_billing', 
                    'checklist.no_spm', 
                    'checklist.ntpn', 
                    'checklist.ntb', 
                    'checklist.kode_jenispajak', 
                    'checklist.kode_jenissetoran', 
                    'checklist.no_sp2d', 
                    'checklist.id_efaktur', 
                )
                ->selectRaw('checklist.id AS id_checklist, spby.tanggal_transaksi AS tanggal_setor_pajak')
                ->groupByRaw('ppn.id_spby')
                ->where('checklist.payment_by', '!=', 'LS')
                ->where('checklist.ada_spby', '=', 1)
                ->get();
            
            return view('pajak/laporan-pajak/excelPajakNonLS', [
                'data' => $data,
                'metode' => $this->metode,
                'tahun' => $this->tahun,
            ]);
        }

        // return view('exportExcel.pengeluaran.bpup', [
        //     'jenisanggaran' => $this->jenisanggaran,
        //     'bulan' => $this->bulan,
        //     'tahun' => $this->tahun,
        //     'data' => $data,
        // ]);
    }
}
