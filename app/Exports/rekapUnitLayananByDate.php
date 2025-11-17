<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class rekapUnitLayananByDate implements FromView
{
    protected $date;
    protected $user;
    protected $shift;

    function __construct($date, $user, $shift) {
        $this->date = $date;
        $this->user = $user;
        $this->shift = $shift;
    }

    public function view(): View
    {
        $unit_layanan = DB::table('benpen')
            ->join('tindakan', 'tindakan.id', '=', 'benpen.tindakan_id')
            ->join('unit_layanan', 'unit_layanan.id', '=', 'tindakan.unit_layanan_id')
            ->selectRaw('tindakan.unit_layanan_id, benpen.tanggal_kuitansi, unit_layanan.layanan, SUM(benpen.harga) as subharga')
            // ->where('tindakan.pemilik', '=', 1)
            ->whereDate('benpen.tanggal_kuitansi', $this->date)
            ->where('benpen.user_id', $this->user)
            ->where('benpen.shift', $this->shift)
            ->groupBy('tindakan.unit_layanan_id')
            ->where('benpen.DK', 'D')
            ->get();


        return view('exportExcel.penerimaan.bydate.unitlayanan', [
            'date' => $this->date,
            'unitlayanan' => $unit_layanan,
        ]);
    }
    
}
