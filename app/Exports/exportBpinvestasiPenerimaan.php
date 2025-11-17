<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class exportBpinvestasiPenerimaan implements FromView
{
    protected $bulan;
    protected $tahun;

    function __construct($bulan, $tahun) {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function view(): View
    {
        $data = DB::table('benpen')
            ->join('kode_transaksi_penerimaan', 'benpen.id_kode_transaksi_penerimaan', '=', 'kode_transaksi_penerimaan.id')
            ->join('tindakan', 'benpen.tindakan_id', '=', 'tindakan.id')
            ->select(
                'benpen.*', 
                'tindakan.tindakan',
                'kode_transaksi_penerimaan.jenis_transaksi',
                'kode_transaksi_penerimaan.bpinvestasi',
            )
            ->where('kode_transaksi_penerimaan.bpinvestasi', '!=', '')
            ->whereRaw('kode_transaksi_penerimaan.bpkas IS NOT NULL')
            ->whereMonth ('benpen.tanggal_kuitansi', $this->bulan)
            ->whereYear('benpen.tanggal_kuitansi', $this->tahun)
            ->orderBy('benpen.tanggal_kuitansi', 'asc')
            ->get();

        return view('exportExcel.penerimaan.bpinvestasi', [
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
            'data' => $data,
        ]);
    }
}
