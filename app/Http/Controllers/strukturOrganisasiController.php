<?php

namespace App\Http\Controllers;

use App\strukturorganisasi;
use App\User;
use App\userhassotk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class strukturOrganisasiController extends Controller
{
    public function index()
    {
        // $data = DB::connection('DB_core')->table('struktur_organisasi')
        //     ->orderBy('struktur_organisasi.kode', 'asc')
        //     ->where([
        //         ['struktur_organisasi.deleted_at', '=', null],
        //     ])->get();

        $data = DB::table('struktur_organisasi')
            ->orderBy('struktur_organisasi.kode', 'asc')
            ->where([
                ['struktur_organisasi.deleted_at', '=', null],
            ])->get();
                
        $user = User::all();

        // dd($data);
        return view('rolepermission.sotk.index', [
            'data' => $data,
            'user' => $user,
        ]);
    }

    public function filtersatu(Request $request){
        // $data = DB::connection('DB_core')->table('struktur_organisasi')
        //     ->select('id', 'head', 'parent', 'child', 'kode', 'jabatan')
        //     ->where('id', $request->idpimpinan)
        //     ->first();

        $data = DB::table('struktur_organisasi')
            ->select('id', 'head', 'parent', 'child', 'kode', 'jabatan')
            ->where('id', $request->idpimpinan)
            ->first();

        echo json_encode($data);
    }

    public function filterdua(Request $request){
        // $response = DB::connection('DB_core')->table('struktur_organisasi')
        //     ->select('child', 'kode', 'jabatan')
        //     ->where('parent', $request->kode)
        //     ->max('child');

        $response = DB::table('struktur_organisasi')
            ->select('child', 'kode', 'jabatan')
            ->where('parent', $request->kode)
            ->max('child');

        if($response == null){
            $data = 1;
        }else{
            $data = $response + 1;
        }
        
        echo json_encode($data);
    }

    public function filtertiga(Request $request){
        // dd($request->sotk_id);

        // $user = DB::connection('DB_core')->table('users')
        //     ->select('name', 'jabatan')
        //     ->leftjoin('user_has_strukturorganisasi', 'user_has_strukturorganisasi.user_id', '=', 'users.id')
        //     ->leftjoin('struktur_organisasi', 'user_has_strukturorganisasi.strukturorganisasi_id', '=', 'struktur_organisasi.id')
        //     ->where('user_has_strukturorganisasi.strukturorganisasi_id', $request->sotk_id)
        //     ->get();

        $user = DB::table('users')
            ->select('name', 'jabatan')
            ->leftjoin('user_has_strukturorganisasi', 'user_has_strukturorganisasi.user_id', '=', 'users.id')
            ->leftjoin('struktur_organisasi', 'user_has_strukturorganisasi.strukturorganisasi_id', '=', 'struktur_organisasi.id')
            ->where('user_has_strukturorganisasi.strukturorganisasi_id', $request->sotk_id)
            ->get();
            
        echo json_encode($user);
    }

    public function create()
    {
        //
    }

    public function storepimpinan(Request $request)
    {
        $data = New strukturorganisasi();
        $data->head = 1;
        $data->parent = null;
        $data->child = 1;
        $data->kode = 1;
        $data->jabatan = $request->pimpinan;
        $data->Save();

        session()->flash('keyword', 'TambahData');
        session()->flash('pesan', 'Data Ditambahkan');
        return redirect('/struktur-organisasi');

    }

    public function hasusersotk(Request $request){
        $input = New userhassotk();
        $input->user_id = $request->user_id;
        $input->strukturorganisasi_id = $request->strukturorganisasi_id;
        $input->Save();

        session()->flash('keyword', 'TambahData');
        session()->flash('pesan', 'Data Ditambahkan');
        return redirect('/struktur-organisasi');
    } 

    public function hasusersotkempty(){
        $empty = userhassotk::truncate();

        session()->flash('keyword', 'TambahData');
        session()->flash('pesan', 'Data dikosongkan');
        return redirect('/struktur-organisasi');
    }   

    public function store(Request $request)
    {
        foreach($request->jabatan as $key => $jabatan)
        {
            $input = new strukturorganisasi();
            $input->head = $request->head[$key];
            $input->parent = $request->parent[$key];
            $input->child = $request->child[$key];
            $input->kode = $request->kode[$key];
            $input->jabatan = $jabatan;
            $input->Save();
        }

        session()->flash('keyword', 'TambahData');
        session()->flash('pesan', 'Data Ditambahkan');
        return redirect('/struktur-organisasi');
    }

    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $delete = strukturorganisasi::find($id);
        $delete->delete($delete);

        session()->flash('keyword', 'TambahData');
        session()->flash('pesan', 'Data dihapus');
        return redirect('/struktur-organisasi');
    }
}
