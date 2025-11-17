<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class exportBpbankPengeluaran implements FromView
{
    protected $bulan;
    protected $tahun;
    protected $jenisanggaran;

    function __construct($bulan, $tahun, $jenisanggaran) {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
        $this->jenisanggaran = $jenisanggaran;
    }

    public function view(): View
    {
        if($this->jenisanggaran != 'All'){
            if($this->bulan == 1){
                $subsaldo = 0;
            }else{
                $blnlalu = $this->bulan - 1;
                $blnsblmnya = DB::table('spby')
                    ->join('kode_transaksi', 'spby.id_kode_transaksi', '=', 'kode_transaksi.id')
                    ->select(
                        'spby.*', 
                        'kode_transaksi.jenis_transaksi',
                        'kode_transaksi.bpbank',
                    )
                    ->where('kode_transaksi.bpbank', '!=', '')
                    ->whereRaw('kode_transaksi.bpbank IS NOT NULL')
                    // ->whereNotIn ('spby.jenis_anggaran', ['LS'])
                    ->where('spby.jenis_anggaran', $this->jenisanggaran)
                    ->whereRaw('MONTH(spby.tanggal_transaksi) BETWEEN 1 AND ' . $blnlalu)
                    ->whereYear('spby.tanggal_transaksi', $this->tahun)
                    ->orderBy('spby.tanggal_transaksi', 'asc')
                    ->where('spby.deleted_at', null)
                    ->get();

                $subsaldo = 0;
                foreach($blnsblmnya as $i){
                    if($i->status_dk == 'D'){$subsaldo = $subsaldo + $i->debit_benpeng;}
                    elseif($i->status_dk == 'K'){$subsaldo = $subsaldo - $i->kredit_benpeng;}
                }

            }

            $data = DB::table('spby')
                ->join('kode_transaksi', 'spby.id_kode_transaksi', '=', 'kode_transaksi.id')
                ->select(
                    'spby.*', 
                    'kode_transaksi.jenis_transaksi',
                    'kode_transaksi.bpbank',
                )
                ->where('kode_transaksi.bpbank', '!=', '')
                ->whereRaw('kode_transaksi.bpbank IS NOT NULL')
                ->where('jenis_anggaran', $this->jenisanggaran)
                ->whereMonth ('tanggal_transaksi', $this->bulan)
                ->whereYear('tanggal_transaksi', $this->tahun)
                ->orderBy('tanggal_transaksi', 'asc')
                ->where('spby.deleted_at', null)
                ->get();
        }else {
            if($this->bulan == 1){
                $subsaldo = 0;
            }else{
                $blnlalu = $this->bulan - 1;
                $blnsblmnya = DB::table('spby')
                ->join('kode_transaksi', 'spby.id_kode_transaksi', '=', 'kode_transaksi.id')
                ->select(
                    'spby.*', 
                    'kode_transaksi.jenis_transaksi',
                    'kode_transaksi.bpbank',
                )
                ->where('kode_transaksi.bpbank', '!=', '')
                ->whereRaw('kode_transaksi.bpbank IS NOT NULL')
                ->whereNotIn ('spby.jenis_anggaran', ['LS'])
                ->whereRaw('MONTH(spby.tanggal_transaksi) BETWEEN 1 AND ' . $blnlalu)
                ->whereYear('tanggal_transaksi', $this->tahun)
                ->orderBy('tanggal_transaksi', 'asc')
                ->where('spby.deleted_at', null)
                ->get();

                $subsaldo = 0;
                foreach($blnsblmnya as $i){
                    if($i->status_dk == 'D'){$subsaldo = $subsaldo + $i->debit_benpeng;}
                    elseif($i->status_dk == 'K'){$subsaldo = $subsaldo - $i->kredit_benpeng;}
                }
            }

            $data = DB::table('spby')
                ->join('kode_transaksi', 'spby.id_kode_transaksi', '=', 'kode_transaksi.id')
                ->select(
                    'spby.*', 
                    'kode_transaksi.jenis_transaksi',
                    'kode_transaksi.bpbank',
                )
                ->where('kode_transaksi.bpbank', '!=', '')
                ->whereRaw('kode_transaksi.bpbank IS NOT NULL')
                ->whereNotIn ('spby.jenis_anggaran', ['LS'])
                ->whereMonth ('tanggal_transaksi', $this->bulan)
                ->whereYear('tanggal_transaksi', $this->tahun)
                ->orderBy('tanggal_transaksi', 'asc')
                ->where('spby.deleted_at', null)
                ->get();
        }

        return view('exportExcel.pengeluaran.bpbank', [
            'jenisanggaran' => $this->jenisanggaran,
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
            'data' => $data,
            'subsaldo_blnlalu' => $subsaldo,
        ]);
    }
}
