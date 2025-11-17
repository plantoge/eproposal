<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class rekapRealisasiBelanjaExport implements FromView
{
    protected $data1;
    protected $data2;

    function __construct($data1, $data2 ) {
        $this->data1 = $data1;
        $this->data2 = $data2;
    }


    public function view(): View
    {
        $idmasterrkakl = $this->data1;
        $periode = $this->data2;
        
        $data = DB::table('monev_realisasi')
            ->rightJoin('itemsv3rkakl', 'monev_realisasi.id_itemsrkaklitem', '=', 'itemsv3rkakl.id')
            ->rightJoin('level_rkakl', 'itemsv3rkakl.levelrkakl_id', '=', 'level_rkakl.id')
            ->rightJoin('masterv3rkakl', 'itemsv3rkakl.masterv3rkakl_id', '=', 'masterv3rkakl.id')
            ->select(
                'itemsv3rkakl.urutan', 
                'itemsv3rkakl.kode', 
                'itemsv3rkakl.deskripsi', 
                'itemsv3rkakl.volume', 
                'itemsv3rkakl.satuan', 
                'itemsv3rkakl.harga_satuan', 
                'itemsv3rkakl.jumlah_biaya', 
                'itemsv3rkakl.master_biaya_publish', 
                'itemsv3rkakl.biaya_publish', 
                'itemsv3rkakl.created_at',
            )
            ->selectRaw('itemsv3rkakl.id AS id_item, monev_realisasi.id AS id_monev')
            ->selectRaw(DB::raw("
                (SELECT SUM(monev_realisasi.realisasi) FROM monev_realisasi 
                RIGHT JOIN itemsv3rkakl ON monev_realisasi.id_itemsrkaklitem = itemsv3rkakl.id
                RIGHT JOIN masterv3rkakl ON itemsv3rkakl.masterv3rkakl_id = masterv3rkakl.id
                WHERE MONTH(monev_realisasi.tanggal_transaksi) = '1' AND
                monev_realisasi.id_itemsrkaklitem = id_item AND 
                itemsv3rkakl.masterv3rkakl_id = $idmasterrkakl AND
                masterv3rkakl.periode_rkakl = $periode) AS januari
            "))
            ->selectRaw(DB::raw("
                (SELECT SUM(monev_realisasi.realisasi) FROM monev_realisasi 
                RIGHT JOIN itemsv3rkakl ON monev_realisasi.id_itemsrkaklitem = itemsv3rkakl.id
                RIGHT JOIN masterv3rkakl ON itemsv3rkakl.masterv3rkakl_id = masterv3rkakl.id
                WHERE MONTH(monev_realisasi.tanggal_transaksi) = '2' AND
                monev_realisasi.id_itemsrkaklitem = id_item AND 
                itemsv3rkakl.masterv3rkakl_id = $idmasterrkakl AND
                masterv3rkakl.periode_rkakl = $periode) AS februari
            "))
            ->selectRaw(DB::raw("
                (SELECT SUM(monev_realisasi.realisasi) FROM monev_realisasi 
                RIGHT JOIN itemsv3rkakl ON monev_realisasi.id_itemsrkaklitem = itemsv3rkakl.id
                RIGHT JOIN masterv3rkakl ON itemsv3rkakl.masterv3rkakl_id = masterv3rkakl.id
                WHERE MONTH(monev_realisasi.tanggal_transaksi) = '3' AND
                monev_realisasi.id_itemsrkaklitem = id_item AND 
                itemsv3rkakl.masterv3rkakl_id = $idmasterrkakl AND
                masterv3rkakl.periode_rkakl = $periode) AS maret
            "))
            ->selectRaw(DB::raw("
                (SELECT SUM(monev_realisasi.realisasi) FROM monev_realisasi 
                RIGHT JOIN itemsv3rkakl ON monev_realisasi.id_itemsrkaklitem = itemsv3rkakl.id
                RIGHT JOIN masterv3rkakl ON itemsv3rkakl.masterv3rkakl_id = masterv3rkakl.id
                WHERE MONTH(monev_realisasi.tanggal_transaksi) = '4' AND
                monev_realisasi.id_itemsrkaklitem = id_item AND 
                itemsv3rkakl.masterv3rkakl_id = $idmasterrkakl AND
                masterv3rkakl.periode_rkakl = $periode) AS april
            "))
            ->selectRaw(DB::raw("
                (SELECT SUM(monev_realisasi.realisasi) FROM monev_realisasi 
                RIGHT JOIN itemsv3rkakl ON monev_realisasi.id_itemsrkaklitem = itemsv3rkakl.id
                RIGHT JOIN masterv3rkakl ON itemsv3rkakl.masterv3rkakl_id = masterv3rkakl.id
                WHERE MONTH(monev_realisasi.tanggal_transaksi) = '5' AND
                monev_realisasi.id_itemsrkaklitem = id_item AND 
                itemsv3rkakl.masterv3rkakl_id = $idmasterrkakl AND
                masterv3rkakl.periode_rkakl = $periode) AS mei
            "))

            ->selectRaw(DB::raw("
                (SELECT SUM(monev_realisasi.realisasi) FROM monev_realisasi 
                RIGHT JOIN itemsv3rkakl ON monev_realisasi.id_itemsrkaklitem = itemsv3rkakl.id
                RIGHT JOIN masterv3rkakl ON itemsv3rkakl.masterv3rkakl_id = masterv3rkakl.id
                WHERE MONTH(monev_realisasi.tanggal_transaksi) = '6' AND
                monev_realisasi.id_itemsrkaklitem = id_item AND 
                itemsv3rkakl.masterv3rkakl_id = $idmasterrkakl AND
                masterv3rkakl.periode_rkakl = $periode) AS juni
            "))
            ->selectRaw(DB::raw("
                (SELECT SUM(monev_realisasi.realisasi) FROM monev_realisasi 
                RIGHT JOIN itemsv3rkakl ON monev_realisasi.id_itemsrkaklitem = itemsv3rkakl.id
                RIGHT JOIN masterv3rkakl ON itemsv3rkakl.masterv3rkakl_id = masterv3rkakl.id
                WHERE MONTH(monev_realisasi.tanggal_transaksi) = '7' AND
                monev_realisasi.id_itemsrkaklitem = id_item AND 
                itemsv3rkakl.masterv3rkakl_id = $idmasterrkakl AND
                masterv3rkakl.periode_rkakl = $periode) AS juli
            "))
            ->selectRaw(DB::raw("
                (SELECT SUM(monev_realisasi.realisasi) FROM monev_realisasi 
                RIGHT JOIN itemsv3rkakl ON monev_realisasi.id_itemsrkaklitem = itemsv3rkakl.id
                RIGHT JOIN masterv3rkakl ON itemsv3rkakl.masterv3rkakl_id = masterv3rkakl.id
                WHERE MONTH(monev_realisasi.tanggal_transaksi) = '8' AND
                monev_realisasi.id_itemsrkaklitem = id_item AND 
                itemsv3rkakl.masterv3rkakl_id = $idmasterrkakl AND
                masterv3rkakl.periode_rkakl = $periode) AS agustus
            "))
            ->selectRaw(DB::raw("
                (SELECT SUM(monev_realisasi.realisasi) FROM monev_realisasi 
                RIGHT JOIN itemsv3rkakl ON monev_realisasi.id_itemsrkaklitem = itemsv3rkakl.id
                RIGHT JOIN masterv3rkakl ON itemsv3rkakl.masterv3rkakl_id = masterv3rkakl.id
                WHERE MONTH(monev_realisasi.tanggal_transaksi) = '9' AND
                monev_realisasi.id_itemsrkaklitem = id_item AND 
                itemsv3rkakl.masterv3rkakl_id = $idmasterrkakl AND
                masterv3rkakl.periode_rkakl = $periode) AS september
            "))
            ->selectRaw(DB::raw("
                (SELECT SUM(monev_realisasi.realisasi) FROM monev_realisasi 
                RIGHT JOIN itemsv3rkakl ON monev_realisasi.id_itemsrkaklitem = itemsv3rkakl.id
                RIGHT JOIN masterv3rkakl ON itemsv3rkakl.masterv3rkakl_id = masterv3rkakl.id
                WHERE MONTH(monev_realisasi.tanggal_transaksi) = '10' AND
                monev_realisasi.id_itemsrkaklitem = id_item AND 
                itemsv3rkakl.masterv3rkakl_id = $idmasterrkakl AND
                masterv3rkakl.periode_rkakl = $periode) AS oktober
            "))
            ->selectRaw(DB::raw("
                (SELECT SUM(monev_realisasi.realisasi) FROM monev_realisasi 
                RIGHT JOIN itemsv3rkakl ON monev_realisasi.id_itemsrkaklitem = itemsv3rkakl.id
                RIGHT JOIN masterv3rkakl ON itemsv3rkakl.masterv3rkakl_id = masterv3rkakl.id
                WHERE MONTH(monev_realisasi.tanggal_transaksi) = '11' AND
                monev_realisasi.id_itemsrkaklitem = id_item AND 
                itemsv3rkakl.masterv3rkakl_id = $idmasterrkakl AND
                masterv3rkakl.periode_rkakl = $periode) AS november
            "))
            ->selectRaw(DB::raw("
                (SELECT SUM(monev_realisasi.realisasi) FROM monev_realisasi 
                RIGHT JOIN itemsv3rkakl ON monev_realisasi.id_itemsrkaklitem = itemsv3rkakl.id
                RIGHT JOIN masterv3rkakl ON itemsv3rkakl.masterv3rkakl_id = masterv3rkakl.id
                WHERE MONTH(monev_realisasi.tanggal_transaksi) = '12' AND
                monev_realisasi.id_itemsrkaklitem = id_item AND 
                itemsv3rkakl.masterv3rkakl_id = $idmasterrkakl AND
                masterv3rkakl.periode_rkakl = $periode) AS desember
            "))
            ->where('itemsv3rkakl.masterv3rkakl_id', '=', $idmasterrkakl)
            ->where('masterv3rkakl.periode_rkakl', '=', $periode)
            ->where('level_rkakl.tingkatan', '=', 8)
            ->where('itemsv3rkakl.deleted_at', '=', null)
            ->orderBy('itemsv3rkakl.urutan_char', 'desc')
            ->groupBy('itemsv3rkakl.id')
            ->get();

            // dd($data);

        return view('anggaranv3.realisasi.excel', [
            'data' => $data, 
            'periode' => $periode, 
            // 'data2' => $data2, 
        ]);
    }
}
