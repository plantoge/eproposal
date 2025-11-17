<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class exportLpjPenerimaan implements FromView
{
    protected $bulan;
    protected $tahun;

    function __construct($bulan, $tahun) {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function view(): View
    {
        $bpkas = $this->loopGetData($this->bulan, $this->tahun, 'kode_transaksi_penerimaan.bpkas');
        $bptunai = $this->loopGetData($this->bulan, $this->tahun, 'kode_transaksi_penerimaan.bptunai');
        $bpbank = $this->loopGetData($this->bulan, $this->tahun, 'kode_transaksi_penerimaan.bpbank');
        $bppendapatan = $this->loopGetData($this->bulan, $this->tahun, 'kode_transaksi_penerimaan.bppendapatan');
        $bpuangdibp = $this->loopGetData($this->bulan, $this->tahun, 'kode_transaksi_penerimaan.bpuangdibp');
        $bpdeposito = $this->loopGetData($this->bulan, $this->tahun, 'kode_transaksi_penerimaan.bpdeposito');
        $bpinvestasi = $this->loopGetData($this->bulan, $this->tahun, 'kode_transaksi_penerimaan.bpinvestasi');
        $bplain = $this->loopGetData($this->bulan, $this->tahun, 'kode_transaksi_penerimaan.bplain');

        return view('exportExcel.penerimaan.lpjPenerimaan', [
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
            'bpkas' => $bpkas,
            'bptunai' => $bptunai,
            'bpbank' => $bpbank,
            'bppendapatan' => $bppendapatan,
            'bpuangdibp' => $bpuangdibp,
            'bpdeposito' => $bpdeposito,
            'bpinvestasi' => $bpinvestasi,
            'bplain' => $bplain,
        ]);
    }

    private function loopGetData($bulan, $tahun, $field){
        $bulan_sebelumnya = $bulan - 1;
        $data_sebelumnya = DB::table('benpen')
            ->join('kode_transaksi_penerimaan', 'benpen.id_kode_transaksi_penerimaan', '=', 'kode_transaksi_penerimaan.id')
            ->join('tindakan', 'benpen.tindakan_id', '=', 'tindakan.id')
            ->select(
                'benpen.*', 
                'tindakan.tindakan',
                'kode_transaksi_penerimaan.jenis_transaksi',
                $field,
            )
            ->where($field, '!=', '')
            ->whereRaw($field . ' IS NOT NULL')
            ->whereRaw("MONTH(benpen.tanggal_kuitansi) BETWEEN 1 AND $bulan_sebelumnya")
            ->whereYear('benpen.tanggal_kuitansi', $tahun)
            ->orderBy('benpen.tanggal_kuitansi', 'asc')
            ->get();
                
            $total_bln_lalu = 0;
            foreach($data_sebelumnya as $i){
                if($i->DK == 'D'){
                    $total_bln_lalu = $total_bln_lalu + $i->harga; 
                }elseif($i->DK == 'K'){
                    $total_bln_lalu = $total_bln_lalu - $i->harga;
                }
            }

        $data = DB::table('benpen')
            ->join('kode_transaksi_penerimaan', 'benpen.id_kode_transaksi_penerimaan', '=', 'kode_transaksi_penerimaan.id')
            ->join('tindakan', 'benpen.tindakan_id', '=', 'tindakan.id')
            ->select(
                'benpen.*', 
                'tindakan.tindakan',
                'kode_transaksi_penerimaan.jenis_transaksi',
                $field,
            )
            ->where($field, '!=', '')
            ->whereRaw($field . ' IS NOT NULL')
            // ->whereRaw("MONTH(benpen.tanggal_kuitansi) BETWEEN 1 AND $bulan_sebelumnya")
            ->whereMonth ('benpen.tanggal_kuitansi', $bulan)
            ->whereYear('benpen.tanggal_kuitansi', $tahun)
            ->orderBy('benpen.tanggal_kuitansi', 'asc')
            ->get();

            // $total = 0;
            $total_debit = 0;
            $total_kredit = 0;
            
            foreach($data as $i){
                if($i->DK == 'D'){
                    // $total = $total + $i->harga; 
                    $total_debit = $total_debit + $i->harga;
                }elseif($i->DK == 'K'){
                    // $total = $total - $i->harga;
                    $total_kredit = $total_kredit + $i->harga;
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
