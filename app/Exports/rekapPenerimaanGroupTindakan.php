<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class rekapPenerimaanGroupTindakan implements FromView
{
    protected $bulan;
    protected $tahun;

    function __construct($bulan, $tahun) {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function view(): View
    {
        $layanan = DB::table('unit_layanan')->get();
        return view('exportExcel.penerimaan.dirut', [
            'layanan' => $layanan,
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
        ]);
    }
}
