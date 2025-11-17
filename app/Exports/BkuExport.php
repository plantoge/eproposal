<?php

namespace App\Exports;

use App\Benpen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BkuExport implements FromView
{
    protected $tahun;
    protected $bulan;

    function __construct($tahun, $bulan) {
        $this->tahun = $tahun;
        $this->bulan = $bulan;
    }

    public function view(): View
    {
        $bulan = $this->bulan;
        $tahun = $this->tahun;

        $saldo_awal = DB::table('benpen')
            ->join('tindakan', 'tindakan.id', '=', 'benpen.tindakan_id')
            ->join('kode_transaksi_penerimaan', 'kode_transaksi_penerimaan.id', '=', 'benpen.id_kode_transaksi_penerimaan')
            ->selectRaw('benpen.shift, benpen.no_bukti, benpen.tanggal_kuitansi, tindakan.tindakan, benpen.DK, benpen.harga, benpen.tanggal_kuitansi, kode_transaksi_penerimaan.jenis_transaksi')
            ->whereIn('benpen.id_kode_transaksi_penerimaan', [23, 24, 25])
            ->whereYear('benpen.tanggal_kuitansi', $tahun)
            ->where('benpen.deleted_at', '=', NULL)
            ->get();

        if($bulan == 1){
            $blnlalu = $bulan;
            // $benpen = \App\Benpen::all();
            $blnsblmnya = DB::table('benpen')
                ->join('tindakan', 'tindakan.id', '=', 'benpen.tindakan_id')
                ->join('kode_transaksi_penerimaan', 'kode_transaksi_penerimaan.id', '=', 'benpen.id_kode_transaksi_penerimaan')
                ->selectRaw('benpen.shift, benpen.no_bukti, benpen.tanggal_kuitansi, tindakan.tindakan, benpen.DK, benpen.harga, benpen.tanggal_kuitansi')
                ->whereMonth('benpen.tanggal_kuitansi', $blnlalu)
                ->whereYear('benpen.tanggal_kuitansi', $tahun)
                ->whereIn('benpen.id_kode_transaksi_penerimaan', [23, 24, 25])
                ->where('benpen.deleted_at', '=', NULL)
                ->get();
        }else{
            $blnlalu = $bulan - 1;
            // $benpen = \App\Benpen::all();
            $blnsblmnya = DB::table('benpen')
                ->join('tindakan', 'tindakan.id', '=', 'benpen.tindakan_id')
                ->join('kode_transaksi_penerimaan', 'kode_transaksi_penerimaan.id', '=', 'benpen.id_kode_transaksi_penerimaan')
                ->selectRaw('benpen.shift, benpen.no_bukti, benpen.tanggal_kuitansi, tindakan.tindakan, benpen.DK, benpen.harga, benpen.tanggal_kuitansi')
                ->whereRaw('MONTH(benpen.tanggal_kuitansi) BETWEEN 1 AND '.$blnlalu)
                // ->whereMonth('benpen.tanggal_kuitansi', $blnlalu)
                ->whereYear('benpen.tanggal_kuitansi', $tahun)
                ->where('benpen.deleted_at', '=', NULL)
                ->get();
        }

        if(date('m') == '01'){$date = date('d ') . 'Januari' . date(' Y');}
        elseif(date('m') == '02'){$date = date('d ') . 'Februari' . date(' Y');}
        elseif(date('m') == '03'){$date = date('d ') . 'Maret' . date(' Y');}
        elseif(date('m') == '04'){$date = date('d ') . 'April' . date(' Y');}
        elseif(date('m') == '05'){$date = date('d ') . 'Mei' . date(' Y');}
        elseif(date('m') == '06'){$date = date('d ') . 'Juni' . date(' Y');}
        elseif(date('m') == '07'){$date = date('d ') . 'Juli' . date(' Y');}
        elseif(date('m') == '08'){$date = date('d ') . 'Agustus' . date(' Y');}
        elseif(date('m') == '09'){$date = date('d ') . 'September' . date(' Y');}
        elseif(date('m') == '10'){$date = date('d ') . 'Oktober' . date(' Y');}
        elseif(date('m') == '11'){$date = date('d ') . 'November' . date(' Y');}
        elseif(date('m') == '12'){$date = date('d ') . 'Desember' . date(' Y');}


        $subsaldo = 0;
        foreach($blnsblmnya as $i){
            if($i->DK == 'D'){$subsaldo = $subsaldo + $i->harga;}
            elseif($i->DK == 'K'){$subsaldo = $subsaldo - $i->harga;}
        }

        $benpen = DB::table('benpen')
            ->join('tindakan', 'tindakan.id', '=', 'benpen.tindakan_id')
            ->join('kode_transaksi_penerimaan', 'kode_transaksi_penerimaan.id', '=', 'benpen.id_kode_transaksi_penerimaan')
            ->selectRaw('benpen.shift, benpen.no_kertas, benpen.id_kode_transaksi_penerimaan, benpen.no_bukti, benpen.tanggal_kuitansi, tindakan.tindakan, benpen.keterangan, benpen.DK, benpen.harga, benpen.tanggal_kuitansi')
            ->whereMonth('benpen.tanggal_kuitansi', $bulan)
            ->whereYear('benpen.tanggal_kuitansi', $tahun)
            ->whereNotIn('benpen.id_kode_transaksi_penerimaan', [23, 24, 25])
            ->where('benpen.deleted_at', '=', NULL)
            ->get();

        return view('exportExcel.bku.bku', [
            'benpen' => $benpen,
            'saldo_awal' => $saldo_awal,
            'subsaldo_blnlalu' => $subsaldo,
            'bulan' => $this->bulan,
            'tahun' => $this->tahun
        ]);
    }
}
