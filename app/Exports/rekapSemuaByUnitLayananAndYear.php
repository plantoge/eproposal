<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class rekapSemuaByUnitLayananAndYear implements FromView
{
    protected $idul;
    protected $year;

    function __construct($idul, $year) {
        $this->idul = $idul;
        $this->year = $year;
    }

    public function view(): View
    {
        $unit_layanan = DB::table('benpen')
            ->join('tindakan', 'tindakan.id', '=', 'benpen.tindakan_id')
            ->join('unit_layanan', 'unit_layanan.id', '=', 'tindakan.unit_layanan_id')
            ->selectRaw('tindakan.tindakan, benpen.tanggal_kuitansi, tindakan.satuan, tindakan.tarif, unit_layanan.layanan, benpen.harga')
            // ->where('tindakan.pemilik', '=', 1)
            ->where('benpen.DK', '=', 'D')
            ->where('unit_layanan_id', $this->idul)
            ->whereYear('benpen.tanggal_kuitansi', $this->year)
            ->get();

        $layanan = \App\Unit_layanan::find($this->idul);

        return view('exportExcel.penerimaan.byyear.detail', [
            'year' => $this->year,
            'unitlayanan' => $unit_layanan,
        ]);
    }
}
