<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class rekapSemuaByRange implements FromView
{
    protected $date1;
    protected $date2;

    function __construct($date1, $date2) {
        $this->tanggal_awal = $date1;
        $this->tanggal_akhir = $date2;
    }

    public function view(): View
    {
        $tindakan = DB::table('benpen')
            ->join('tindakan', 'tindakan.id', '=', 'benpen.tindakan_id')
            ->selectRaw('benpen.tanggal_kuitansi, tindakan.tindakan, SUM(benpen.harga) as subharga, COUNT(benpen.id) as item')
            // ->where('tindakan.pemilik', '=', 1)
            ->where('benpen.DK', '=', 'D')
            ->whereBetween('benpen.tanggal_kuitansi', [$this->tanggal_awal, $this->tanggal_akhir])
            ->groupBy('benpen.tindakan_id')
            ->get();

        return view('exportExcel.penerimaan.byrange.tindakan', [
            'tanggal_awal' => $this->tanggal_awal,
            'tanggal_akhir' => $this->tanggal_akhir,
            'tindakan' => $tindakan,
        ]);
    }
}
