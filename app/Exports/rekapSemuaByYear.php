<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class rekapSemuaByYear implements FromView
{
    protected $year;

    function __construct($year) {
        $this->year = $year;
    }

    public function view(): View
    {
        $tindakan = DB::table('benpen')
            ->join('tindakan', 'tindakan.id', '=', 'benpen.tindakan_id')
            ->selectRaw('benpen.tanggal_kuitansi, tindakan.tindakan, SUM(benpen.harga) as subharga, COUNT(benpen.id) as item')
            // ->where('tindakan.pemilik', '=', 1)
            ->where('benpen.DK', '=', 'D')
            ->whereYear('benpen.tanggal_kuitansi', $this->year)
            ->groupBy('benpen.tindakan_id')
            ->get(); 

        return view('exportExcel.penerimaan.byyear.tindakan', [
            'year' => $this->year,
            'tindakan' => $tindakan,
        ]);
    }
}
