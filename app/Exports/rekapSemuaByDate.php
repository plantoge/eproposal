<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;

class rekapSemuaByDate implements FromView
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
        if(Auth::user()->hasAnyRole('Kasir')){
            $user = Auth::user()->id;
        }else{
            $user = $this->user;
        }

        $user_pengguna = User::role(['Kasir','bendahara_penerimaan'])->get();
        
        $tindakan = DB::table('benpen')
            ->join('tindakan', 'tindakan.id', '=', 'benpen.tindakan_id')
            ->selectRaw('
                benpen.DK,
                benpen.tanggal_kuitansi,
                tindakan.tindakan,
                SUM(benpen.harga) as subharga,
                COUNT(benpen.id) as item
            ')
            ->whereDate('benpen.tanggal_kuitansi', $this->date)
            ->where('benpen.shift', $this->shift)
            ->where('benpen.user_id', $user)
            ->where('benpen.DK', 'D')
            ->groupBy('benpen.tindakan_id')
            // ->groupBy('benpen.id')
            ->where('benpen.deleted_at', null)
            ->get();

            $rincian = DB::table('benpen_trans')
            ->join('benpen', 'benpen.benpen_trans_id', '=', 'benpen_trans.id')
            ->selectRaw('benpen.tanggal_kuitansi, benpen_trans.tunai, benpen_trans.edc, benpen_trans.qris, benpen_trans.transfer, benpen_trans.va, benpen_trans.deposit, benpen_trans.pengembalian_deposit')
            // ->selectRaw('COUNT(benpen_trans.id) AS total_transaksi')
            // ->selectRaw('benpen.tanggal_kuitansi, SUM(benpen_trans.tunai) as tunai, SUM(benpen_trans.edc) as edc, SUM(benpen_trans.qris) as qris, SUM(benpen_trans.transfer) as transfer, SUM(benpen_trans.va) as va')
            ->whereDate('benpen.tanggal_kuitansi', $this->date)
            ->where('benpen.shift', $this->shift)
            ->where('benpen.user_id', $user)
            ->groupBy('benpen_trans.id')
            ->where('benpen.deleted_at', null)
            ->get();

            $tunai=0; $edc=0; $qris=0; $transfer=0; $va=0; $deposit=0; $pengembalian_deposit=0;
            foreach ($rincian as $key => $value) {
                $tunai = $tunai + $value->tunai;
                $edc = $edc + $value->edc;
                $qris = $qris + $value->qris;
                $transfer = $transfer + $value->transfer;
                $va = $va + $value->va;
                $deposit = $deposit + $value->deposit;
                $pengembalian_deposit = $pengembalian_deposit + $value->pengembalian_deposit;
            }

            $returnall = DB::table('benpen')
            // ->selectRaw('benpen.tanggal_kuitansi')
            ->whereDate('benpen.tanggal_kuitansi', $this->date)
            ->where('benpen.shift', $this->shift)
            ->where('benpen.DK', 'K')
            ->where('benpen.user_id', $user)
            ->groupBy('benpen.id')
            ->where('benpen.deleted_at', null)
            ->sum('harga');

            $ctt = [
                'tunai' => $tunai,
                'qris' => $qris,
                'va' => $va,
                'edc' => $edc,
                'transfer' => $transfer,
                'deposit' => $deposit,
                'pengembalian_deposit' => $pengembalian_deposit,
                'returnall' => $returnall,
            ];

            $uangmuka = DB::table('uangmuka')
                ->join('uangmuka_item', 'uangmuka_item.uangmuka_id', '=', 'uangmuka.id')
                ->select(
                    'uangmuka.nama_pasien',
                    'uangmuka.nomor_mr',
                    'uangmuka_item.tanggal_awal', 
                    'uangmuka_item.created_at', 
                    'uangmuka_item.saldo', 
                )
                ->whereDate('uangmuka_item.tanggal_awal', $this->date)
                ->where('uangmuka_item.shift', $this->shift)
                ->where('uangmuka_item.deleted_at', null)
                ->groupBy('uangmuka_item.id')
                ->get();

            $sumuangmukanontunai = DB::table('uangmuka_item')
                // ->join('uangmuka_item', 'uangmuka_item.uangmuka_id', '=', 'uangmuka.id')
                ->whereDate('tanggal_awal', $this->date)
                ->where('shift', $this->shift)
                ->where('jenis_transaksi', 'nontunai')
                ->where('deleted_at', null)
                ->sum('saldo');

            $sumuangmukatunai = DB::table('uangmuka_item')
                // ->join('uangmuka_item', 'uangmuka_item.uangmuka_id', '=', 'uangmuka.id')
                ->whereDate('uangmuka_item.tanggal_awal', $this->date)
                ->where('uangmuka_item.shift', $this->shift)
                ->where('uangmuka_item.jenis_transaksi', 'Tunai')
                ->where('deleted_at', null)
                ->sum('saldo');

            $sumuangmuka = [
                'tunai' => $sumuangmukatunai,
                'nontunai' => $sumuangmukanontunai
            ];


        return view('exportExcel.penerimaan.bydate.tindakan', [
            'date' => $this->date,
            'tindakan' => $tindakan,
            'shift' => $this->shift,
            'user' => $user,
            'ctt' => $ctt,
            'uangmuka' => $uangmuka,
            'sumuangmuka' => $sumuangmuka,
        ]);
    }
}
