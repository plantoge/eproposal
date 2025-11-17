<?php

namespace App\Http\Controllers\module;

use App\Http\Controllers\Controller;
use App\Model\proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class historyProposalController extends Controller
{
    public function index()
    {
        $data = DB::Table('proposal')
            ->whereIn('proposal.PROPOSAL_STATUS', ['Penelitian Selesai', 'Ditolak'])
            ->get();
        
        return view('module/admin/OP_history_proposal/index', [
            'pengajuanpenelitian' => $data
        ]);
    }

    public function return($proposal_id){
        $update = proposal::where('PROPOSAL_ID', $proposal_id)->first();

        $existsdata = $update !== null;

        if($existsdata == true){
            if($update->PROPOSAL_STATUS == 'Ditolak'){
                $update->PROPOSAL_TAHAPAN = '1';
                $update->PROPOSAL_STATUS = '-';
            }elseif($update->PROPOSAL_STATUS == 'Penelitian Selesai'){
                $update->PROPOSAL_TAHAPAN = '5';
                $update->PROPOSAL_STATUS = 'Dokumen Akhir';
            }
            $update->save();


            session()->flash('keyword', 'TambahData');
            session()->flash('pesan', 'update berhasil');
            return redirect('/riwayat-proposal');
        }else{
            session()->flash('keyword', 'Error');
            session()->flash('pesan', 'Data tidak ditemukan');
            return redirect('/riwayat-proposal');

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
