<?php

namespace App\Http\Controllers\module;

use App\Http\Controllers\Controller;
use App\Model\proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class riwayatPengajuanController extends Controller
{
    public function index(){
        $data = proposal::where('proposal.proposal_user_id', Auth::user()->id)
            ->whereIn('proposal_status', ['Penelitian Selesai','Ditolak'])
            ->paginate(5);
        $totaldata = $data->total();

        return view('module/admin/VI_pengajuan_proposal/riwayat', [
            'pengajuanpenelitian' => $data,
            'totaldata' =>$totaldata
        ]);
    }
}
