<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class exportBpPajakPengeluaran implements FromView
{
    protected $bulan;
    protected $tahun;
    protected $jenis_anggaran;

    function __construct($bulan, $tahun, $jenis_anggaran) {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
        $this->jenis_anggaran = $jenis_anggaran;
    }

    public function view(): View
    {
        if($this->jenis_anggaran != 'All'){
            $ppn = $this->loopGetDataAll($this->bulan, $this->tahun, $this->jenis_anggaran, 'ppn');
            $pph21 = $this->loopGetDataAll($this->bulan, $this->tahun, $this->jenis_anggaran, 'pph21');
            $pph22 = $this->loopGetDataAll($this->bulan, $this->tahun, $this->jenis_anggaran, 'pph22');
            $pph23 = $this->loopGetDataAll($this->bulan, $this->tahun, $this->jenis_anggaran, 'pph23');
            $pasal4ayat2 = $this->loopGetDataAll($this->bulan, $this->tahun, $this->jenis_anggaran, 'pasal4ayat2');
            $setoranlain = $this->loopGetDataAll($this->bulan, $this->tahun, $this->jenis_anggaran, 'setoranlain');
        }else {
            $ppn = $this->loopGetData($this->bulan, $this->tahun, 'ppn');
            $pph21 = $this->loopGetData($this->bulan, $this->tahun, 'pph21');
            $pph22 = $this->loopGetData($this->bulan, $this->tahun, 'pph22');
            $pph23 = $this->loopGetData($this->bulan, $this->tahun, 'pph23');
            $pasal4ayat2 = $this->loopGetData($this->bulan, $this->tahun, 'pasal4ayat2');
            $setoranlain = $this->loopGetData($this->bulan, $this->tahun, 'setoranlain');
    }

        return view('exportExcel.pengeluaran.bppajak', [
            'jenisanggaran' => $this->jenis_anggaran,
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
            'ppn' => $ppn,
            'pph21' => $pph21,
            'pph22' => $pph22,
            'pph23' => $pph23,
            'pasal4ayat2' => $pasal4ayat2,
            'setoranlain' => $setoranlain,
        ]);
    }

    private function loopGetData($bulan, $tahun, $field){
        $data = DB::table($field)
            ->join('kode_transaksi', $field.'.id_kode_transaksi', '=', 'kode_transaksi.id')
            ->leftjoin('spby', 'spby.id', '=', $field.'.id_spby')
            ->select(
                'kode_transaksi.jenis_transaksi',
                'kode_transaksi.bppajak',
                'spby.id',
                'spby.tanggal_transaksi', 
                'spby.jenis_anggaran', 
                'spby.nomor_spby', 
                'spby.desk_pengeluaran', 
                $field.'.*', 
            )
            ->where('kode_transaksi.bppajak', '!=', '')
            ->whereRaw('kode_transaksi.bppajak IS NOT NULL')
            ->whereMonth ('spby.tanggal_transaksi', $bulan)
            ->whereYear('spby.tanggal_transaksi', $tahun)
            ->orderBy('spby.tanggal_transaksi', 'asc')
            ->get();

        return $data;
    }

    private function loopGetDataAll($bulan, $tahun, $jenis_anggaran, $field){
        $data = DB::table($field)
            ->join('kode_transaksi', $field.'.id_kode_transaksi', '=', 'kode_transaksi.id')
            ->leftjoin('spby', 'spby.id', '=', $field.'.id_spby')
            ->select(
                'kode_transaksi.jenis_transaksi',
                'kode_transaksi.bppajak',
                'spby.id',
                'spby.tanggal_transaksi', 
                'spby.jenis_anggaran', 
                'spby.nomor_spby', 
                'spby.desk_pengeluaran', 
                $field.'.*', 
            )
            ->where('kode_transaksi.bppajak', '!=', '')
            ->whereRaw('kode_transaksi.bppajak IS NOT NULL')
            ->where('spby.jenis_anggaran', $jenis_anggaran)
            ->whereMonth ('spby.tanggal_transaksi', $bulan)
            ->whereYear('spby.tanggal_transaksi', $tahun)
            ->orderBy('spby.tanggal_transaksi', 'asc')
            ->get();

        return $data;
    }
}
