<?php

namespace App\Exports;

use app\spby;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class bkuBendaharaPengeluaranExport implements FromView
{
    protected $bulan;
    protected $tahun;
    protected $jenisanggaran;

    function __construct($jenisanggaran, $tahun, $bulan ) {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
        $this->jenisanggaran = $jenisanggaran;
    }

    public function view(): View
    {
        $jenisanggaran = $this->jenisanggaran;
        $bulan = (int)$this->bulan;
        $tahun = (int)$this->tahun;

        if($jenisanggaran == 'All'){
            // tarik data bulan lalu
            if($bulan == 1){
                $subsaldo = 0;
            }else{
                $blnlalu = $bulan - 1;
                $blnsblmnya = DB::table('spby')
                    ->whereNotIn ('jenis_anggaran', ['LS'])
                    ->whereRaw('MONTH(tanggal_transaksi) BETWEEN 1 AND ' . $blnlalu)
                    ->whereYear('tanggal_transaksi', $tahun)
                    ->orderBy('created_at', 'asc')
                    ->where('deleted_at', '=', NULL)
                    ->get();
                    
                $subsaldo = 0;
                foreach($blnsblmnya as $i){
                    if($i->status_dk == 'D'){$subsaldo = $subsaldo + $i->debit_benpeng;}
                    elseif($i->status_dk == 'K'){$subsaldo = $subsaldo - $i->kredit_benpeng;}
                }
            }

            // tarik data bulan terpilih
            $data = DB::table('spby')
                ->whereNotIn ('jenis_anggaran', ['LS'])
                ->whereMonth ('tanggal_transaksi', $bulan)
                ->whereYear('tanggal_transaksi', $tahun)
                ->orderBy('created_at', 'asc')
                ->where('deleted_at', '=', NULL)
                ->get();

            return view('bendahara_pengeluaran.bku.excel', [
                'data' => $data,
                'jenisanggaran' => $jenisanggaran,
                'subsaldo_blnlalu' => $subsaldo,
                'bulan' => $bulan,
                'tahun' => $tahun
            ]);

        }else{
            // tarik data bln lalu
            if($bulan == 1){
                $subsaldo = 0;
            }else{
                $blnlalu = $bulan - 1;
                $blnsblmnya = DB::table('spby')
                    ->where('jenis_anggaran', $jenisanggaran)
                    ->whereRaw('MONTH(tanggal_transaksi) BETWEEN 1 AND ' . $blnlalu)
                    ->whereYear('tanggal_transaksi', $tahun)
                    ->orderBy('created_at', 'asc')
                    ->where('deleted_at', '=', NULL)
                    ->get();
                    
                $subsaldo = 0;
                foreach($blnsblmnya as $i){
                    if($i->status_dk == 'D'){$subsaldo = $subsaldo + $i->debit_benpeng;}
                    elseif($i->status_dk == 'K'){$subsaldo = $subsaldo - $i->kredit_benpeng;}
                }
            }

            // tarik data bulan terpilih
            $data = DB::table('spby')
                ->where('jenis_anggaran', $jenisanggaran)
                ->whereMonth ('tanggal_transaksi', $bulan)
                ->whereYear('tanggal_transaksi', $tahun)
                ->orderBy('created_at', 'asc')
                ->where('deleted_at', '=', NULL)
                ->get();

            return view('bendahara_pengeluaran.bku.excelBeda', [
                'data' => $data,
                'jenisanggaran' => $jenisanggaran,
                'bulan' => $bulan,
                'subsaldo_blnlalu' => $subsaldo,
                'tahun' => $tahun
            ]);
        }
    }
}
