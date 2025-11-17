<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class rekapUnitLayananByYear implements FromView
{
    protected $year;

    function __construct($year) {
        $this->year = $year;
    }

    public function view(): View
    {
        $unit_layanan = DB::table('benpen')
            ->join('tindakan', 'tindakan.id', '=', 'benpen.tindakan_id')
            ->join('unit_layanan', 'unit_layanan.id', '=', 'tindakan.unit_layanan_id')
            ->selectRaw('tindakan.unit_layanan_id, benpen.tanggal_kuitansi, unit_layanan.layanan, SUM(benpen.harga) as subharga')
            // ->where('tindakan.pemilik', '=', 1)
            ->where('benpen.DK', '=', 'D')
            ->whereYear('benpen.tanggal_kuitansi', $this->year)
            ->groupBy('tindakan.unit_layanan_id')
            ->get();

        return view('exportExcel.penerimaan.byyear.unitlayanan', [
            'year' => $this->year,
            'unitlayanan' => $unit_layanan,
        ]);
    }
}
