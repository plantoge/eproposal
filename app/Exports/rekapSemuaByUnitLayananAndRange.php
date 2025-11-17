<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class rekapSemuaByUnitLayananAndRange implements FromView
{
    protected $idul;
    protected $date1;

    function __construct($idul, $date1, $date2) {
        $this->idul = $idul;
        $this->tanggal_awal = $date1;
        $this->tanggal_akhir = $date2;
    }

    public function view(): View
    {
        $unit_layanan = DB::table('benpen')
            ->join('tindakan', 'tindakan.id', '=', 'benpen.tindakan_id')
            ->join('unit_layanan', 'unit_layanan.id', '=', 'tindakan.unit_layanan_id')
            ->selectRaw('tindakan.tindakan, benpen.tanggal_kuitansi, tindakan.satuan, tindakan.tarif, unit_layanan.layanan, benpen.harga')
            // ->where('tindakan.pemilik', '=', 1)
            ->where('unit_layanan_id', $this->idul)
            ->whereBetween('benpen.tanggal_kuitansi', [$this->tanggal_awal, $this->tanggal_akhir])
            ->where('benpen.DK', 'D')
            ->get();

        $layanan = \App\Unit_layanan::find($this->idul);

        return view('exportExcel.penerimaan.byrange.detail', [
            'tanggal_awal' => $this->tanggal_awal,
            'tanggal_akhir' => $this->tanggal_akhir,
            'unitlayanan' => $unit_layanan,
        ]);
    }
}
