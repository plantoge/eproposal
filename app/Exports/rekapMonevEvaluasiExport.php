<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class rekapMonevEvaluasiExport implements FromView
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
                'itemsv3rkakl.masterv3rkakl_id', 
                'itemsv3rkakl.urutan', 
                'itemsv3rkakl.urutan_char', 
                'itemsv3rkakl.kode', 
                'itemsv3rkakl.deskripsi', 
                'itemsv3rkakl.volume', 
                'itemsv3rkakl.satuan', 
                'itemsv3rkakl.harga_satuan', 
                'itemsv3rkakl.jumlah_biaya', 
                'itemsv3rkakl.master_biaya_publish', 
                'itemsv3rkakl.biaya_publish', 
                'itemsv3rkakl.created_at', 
                'monev_realisasi.rpd_status', 
            )
            ->selectRaw('itemsv3rkakl.id AS id_item, monev_realisasi.id AS id_monev')
            ->selectRaw(DB::raw("
                (
                    SELECT 
                        SUM(IF(monev_realisasi.rpd_status = '+', monev_realisasi.rpd, 0)) - SUM(IF(monev_realisasi.rpd_status = '-', monev_realisasi.rpd, 0))
                    FROM monev_realisasi
                    JOIN itemsv3rkakl ON monev_realisasi.id_itemsrkaklitem = itemsv3rkakl.id
                    JOIN level_rkakl ON itemsv3rkakl.levelrkakl_id = level_rkakl.id
                    JOIN masterv3rkakl ON itemsv3rkakl.masterv3rkakl_id = masterv3rkakl.id
                    WHERE 
                        id_itemsrkaklitem = id_item AND
                        itemsv3rkakl.masterv3rkakl_id = $idmasterrkakl AND
                        masterv3rkakl.periode_rkakl = $periode 
                ) AS rpd
            "))
            ->selectRaw(DB::raw("
                (
                    SELECT 
                        SUM(IF(monev_realisasi.tagihan_status = '+', monev_realisasi.tagihan, 0)) - SUM(IF(monev_realisasi.tagihan_status = '-', monev_realisasi.tagihan, 0))
                    FROM monev_realisasi
                    JOIN itemsv3rkakl ON monev_realisasi.id_itemsrkaklitem = itemsv3rkakl.id
                    JOIN level_rkakl ON itemsv3rkakl.levelrkakl_id = level_rkakl.id
                    JOIN masterv3rkakl ON itemsv3rkakl.masterv3rkakl_id = masterv3rkakl.id
                    WHERE 
                        id_itemsrkaklitem = id_item AND
                        itemsv3rkakl.masterv3rkakl_id = $idmasterrkakl AND
                        masterv3rkakl.periode_rkakl = $periode 
                ) AS tagihan
            "))
            ->selectRaw(DB::raw("
                (
                    SELECT 
                        SUM(IF(monev_realisasi.realisasi_status = '+', monev_realisasi.realisasi, 0)) - SUM(IF(monev_realisasi.realisasi_status = '-', monev_realisasi.realisasi, 0))
                    FROM monev_realisasi
                    JOIN itemsv3rkakl ON monev_realisasi.id_itemsrkaklitem = itemsv3rkakl.id
                    JOIN level_rkakl ON itemsv3rkakl.levelrkakl_id = level_rkakl.id
                    JOIN masterv3rkakl ON itemsv3rkakl.masterv3rkakl_id = masterv3rkakl.id
                    WHERE 
                        id_itemsrkaklitem = id_item AND
                        itemsv3rkakl.masterv3rkakl_id = $idmasterrkakl AND
                        masterv3rkakl.periode_rkakl = $periode 
                ) AS realisasi
            "))
            
            ->where('itemsv3rkakl.masterv3rkakl_id', '=', $idmasterrkakl)
            ->where('masterv3rkakl.periode_rkakl', '=', $periode)
            ->where('level_rkakl.tingkatan', '=', 8)
            ->where('monev_realisasi.deleted_at', '=', null)
            ->where('itemsv3rkakl.deleted_at', '=', null)
            ->where('level_rkakl.deleted_at', '=', null)
            ->where('masterv3rkakl.deleted_at', '=', null)
            ->orderBy('itemsv3rkakl.urutan_char', 'desc')
            ->groupBy('itemsv3rkakl.id')
            ->get();

        return view('anggaranv3.monev.excel', [
            'data' => $data, 
            'periode' => $periode, 
            // 'data2' => $data2, 
        ]);
    }
}
