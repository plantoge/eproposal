<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class rekapUnitLayananByrange implements FromView
{
    protected $date1;
    protected $date2;

    function __construct($date1, $date2) {
        $this->tanggal_awal = $date1;
        $this->tanggal_akhir = $date2;
    }

    public function view(): View
    {
        $unit_layanan = DB::table('benpen')
            ->join('tindakan', 'tindakan.id', '=', 'benpen.tindakan_id')
            ->join('unit_layanan', 'unit_layanan.id', '=', 'tindakan.unit_layanan_id')
            ->selectRaw('tindakan.unit_layanan_id, benpen.tanggal_kuitansi, unit_layanan.layanan, SUM(benpen.harga) as subharga')
            // ->where('tindakan.pemilik', '=', 1)
            ->where('benpen.DK', '=', 'D')
            ->whereBetween('benpen.tanggal_kuitansi', [$this->tanggal_awal, $this->tanggal_akhir])
            ->groupBy('tindakan.unit_layanan_id')
            ->get();


        return view('exportExcel.penerimaan.byrange.unitlayanan', [
            'tanggal_awal' => $this->tanggal_awal,
            'tanggal_akhir' => $this->tanggal_akhir,
            'unitlayanan' => $unit_layanan,
        ]);
    }
}
