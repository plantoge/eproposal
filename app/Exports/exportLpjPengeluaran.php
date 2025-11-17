<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class exportLpjPengeluaran implements FromView
{
    protected $bulan;
    protected $tahun;

    function __construct($bulan, $tahun) {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function view(): View
    {
        $bpkas = $this->loopGetDataP($this->bulan, $this->tahun, 'kode_transaksi.bpkas');
        $bpbank = $this->loopGetDataP($this->bulan, $this->tahun, 'kode_transaksi.bpbank');
        $bptunai = $this->loopGetDataP($this->bulan, $this->tahun, 'kode_transaksi.bptunai');
        $bpum = $this->loopGetDataP($this->bulan, $this->tahun, 'kode_transaksi.bpum');
        $bpbpp = $this->loopGetDataP($this->bulan, $this->tahun, 'kode_transaksi.bpbpp');
        $bpupb = $this->loopGetDataP($this->bulan, $this->tahun, 'kode_transaksi.bpupb');
        $bpup = $this->loopGetDataP($this->bulan, $this->tahun, 'kode_transaksi.bpup');
        $bpls = $this->loopGetDataP($this->bulan, $this->tahun, 'kode_transaksi.bpls');
        $bppajak = $this->loopGetDataP($this->bulan, $this->tahun, 'kode_transaksi.bppajak');
        $bppendapatan = $this->loopGetDataP($this->bulan, $this->tahun, 'kode_transaksi.bppendapatan');
        $bpudbp = $this->loopGetDataP($this->bulan, $this->tahun, 'kode_transaksi.bpudbp');
        $bpupk = $this->loopGetDataP($this->bulan, $this->tahun, 'kode_transaksi.bpupk');
        $bphibah = $this->loopGetDataP($this->bulan, $this->tahun, 'kode_transaksi.bphibah');
        $bpuangtitipan = $this->loopGetDataP($this->bulan, $this->tahun, 'kode_transaksi.bpuangtitipan');
        $bpdana = $this->loopGetDataP($this->bulan, $this->tahun, 'kode_transaksi.bpdana');
        $bplain = $this->loopGetDataP($this->bulan, $this->tahun, 'kode_transaksi.bplain');

        return view('exportExcel.pengeluaran.lpjPengeluaran', [
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
            'bpkas' => $bpkas,
            'bpbank' => $bpbank,
            'bptunai' => $bptunai,
            'bpum' => $bpum,
            'bpbpp' => $bpbpp,
            'bpupb' => $bpupb,
            'bpup' => $bpup,
            'bpls' => $bpls,
            'bppajak' => $bppajak,
            'bppendapatan' => $bppendapatan,
            'bpudbp' => $bpudbp,
            'bpupk' => $bpupk,
            'bphibah' => $bphibah,
            'bpuangtitipan' => $bpuangtitipan,
            'bpdana' => $bpdana,
            'bplain' => $bplain,
        ]);
    }

    private function loopGetDataP($bulan, $tahun, $field){
        $bulan_sebelumnya = $bulan - 1;
        $data_sebelumnya = DB::table('spby')
            ->join('kode_transaksi', 'spby.id_kode_transaksi', '=', 'kode_transaksi.id')
            ->select(
                'spby.*', 
                'kode_transaksi.jenis_transaksi',
                $field,
            )
            ->where($field, '!=', '')
            ->whereRaw($field . ' IS NOT NULL')
            ->whereRaw("MONTH(spby.tanggal_transaksi) BETWEEN 1 AND $bulan_sebelumnya")
            ->whereYear('spby.tanggal_transaksi', $tahun)
            ->orderBy('spby.tanggal_transaksi', 'asc')
            ->get();
                
            $total_bln_lalu = 0;
            foreach($data_sebelumnya as $i){
                if($i->status_dk == 'D'){
                    $total_bln_lalu = $total_bln_lalu + $i->nominal_spby; 
                }elseif($i->status_dk == 'K'){
                    $total_bln_lalu = $total_bln_lalu - $i->nominal_spby;
                }
            }

        $data = DB::table('spby')
            ->join('kode_transaksi', 'spby.id_kode_transaksi', '=', 'kode_transaksi.id')
            ->select(
                'spby.*', 
                'kode_transaksi.jenis_transaksi',
                $field,
            )
            ->where($field, '!=', '')
            ->whereRaw($field . ' IS NOT NULL')
            // ->whereRaw("MONTH(spby.tanggal_kuitansi) BETWEEN 1 AND $bulan_sebelumnya")
            ->whereMonth ('spby.tanggal_transaksi', $bulan)
            ->whereYear('spby.tanggal_transaksi', $tahun)
            ->orderBy('spby.tanggal_transaksi', 'asc')
            ->get();

            // $total = 0;
            $total_debit = 0;
            $total_kredit = 0;
            
            foreach($data as $i){
                if($i->status_dk == 'D'){
                    // $total = $total + $i->nominal_spby; 
                    $total_debit = $total_debit + $i->nominal_spby;
                }elseif($i->status_dk == 'K'){
                    // $total = $total - $i->nominal_spby;
                    $total_kredit = $total_kredit + $i->nominal_spby;
                }
            }

            $data_lpj = [
                'total_sebelum' => $total_bln_lalu,
                'total'=>(($total_bln_lalu + $total_debit) - $total_kredit), 
                'total_debit'=>$total_debit, 
                'total_kredit'=>$total_kredit
            ];
        return $data_lpj;
    }
}
