<?php

namespace App\Http\Controllers\module;

use app\Helpers\Filestorage;
use App\Http\Controllers\Controller;
use App\Model\proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class antrianProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = proposal::whereNotIn('PROPOSAL_STATUS', ['Penelitian Selesai', 'Ditolak'])
                    ->orderBy('created_at','desc')
                    ->get(); 

        return view('module/admin/OP_antrian_proposal/index', [
            'pengajuanpenelitian' => $data
        ]);
    }

    // control update status peneliti
    public function update(Request $request, $id)
    {
        $update = proposal::where('PROPOSAL_ID', $id)->first();
        $existsdata = $update !== null;

        if($existsdata == true){
            if($request->status == 'Verifikasi'){
                $update->PROPOSAL_TAHAPAN = '1';
            }else if($request->status == 'Kelengkapan Dokumen'){
                $update->PROPOSAL_TAHAPAN = '2';
            }else if($request->status == 'Administrasi'){
                $update->PROPOSAL_TAHAPAN = '3';      
            }else if($request->status == 'Pelaksanaan Penelitian'){
                $update->PROPOSAL_TAHAPAN = '4';      
            }else if($request->status == 'Dokumen Akhir'){
                $update->PROPOSAL_TAHAPAN = '5';
            }
            $update->PROPOSAL_STATUS = $request->status;
            $update->save();

            session()->flash('keyword', 'TambahData');
            session()->flash('pesan', 'update berhasil');
            return redirect('/antrian-proposal');
        }else{
            session()->flash('keyword', 'Error');
            session()->flash('pesan', 'Data tidak ditemukan');
            return redirect('/antrian-proposal');

        }
    }

    public function tolak(Request $request)
    {
        $rule = [
            'suratpenolakan' => ['required','max:2048', 'mimes:pdf'],
        ];

        $pesan = [
            'suratpenolakan.required' => 'Kolom harus diisi.',
            'suratpenolakan.max' => 'Kolom ini maksimal :max .',
            'suratpenolakan.mimes' => 'Kolom ini harus berupa file dengan ekstensi pdf.',
        ];

        $validator = Validator::make($request->all(), $rule, $pesan);

        if ($validator->fails()) {
            // return redirect()->route('create-event')->withErrors($validator)->withInput($request->all());

            return response()->json([
                'status_code' => 422, //422 | server meresponse tapi validasi tidak lolos
                'errors' => $validator->errors(),
            ]);
        }

        $update = proposal::where('PROPOSAL_ID', $request->pengajuann)->first();
        $existsdata = $update !== null;

        if($existsdata == true){
            if($update->PROPOSAL_SURAT_PENOLAKAN != null){ Filestorage::delete('FILE_SURAT_PENOLAKAN', $update->PROPOSAL_SURAT_PENOLAKAN); }
            $update->PROPOSAL_SURAT_PENOLAKAN     = Filestorage::upload('FILE_SURAT_PENOLAKAN', $request->file('suratpenolakan'));
            $update->PROPOSAL_STATUS = 'Ditolak';
            $update->save();

            $responseData = [
                'status_code' => 200,
                'message' => 'Berhasil upload Surat',
                'additionalData' => 'Nilai tambahan jika diperlukan.'
            ];
            
            return response()->json($responseData, 200);
        }else{
            $responseData = [
                'status_code' => 200,
                'message' => 'Data tidak ditemukan',
                'additionalData' => 'Nilai tambahan jika diperlukan.'
            ];
            
            return response()->json($responseData, 200);

        }
    }

    public function tanggapanrevisi(Request $request)
    {
        $rule = [
            'surattanggapan' => ['required','max:2048', 'mimes:pdf'],
        ];

        $pesan = [
            'surattanggapan.required' => 'Kolom upload harus diisi.',
            'surattanggapan.max' => 'Kolom ini maksimal :max .',
            'surattanggapan.mimes' => 'Kolom ini harus berupa file dengan ekstensi pdf.',
        ];

        $validator = Validator::make($request->all(), $rule, $pesan);

        if ($validator->fails()) {
            // return redirect()->route('create-event')->withErrors($validator)->withInput($request->all());

            return response()->json([
                'status_code' => 422, //422 | server meresponse tapi validasi tidak lolos
                'errors' => $validator->errors(),
            ]);
        }

        $update = proposal::where('PROPOSAL_ID', $request->pengajuann)->first();
        $existsdata = $update !== null;

        if($existsdata == true){
            if($update->PROPOSAL_SURAT_TANGGAPAN != null){ Filestorage::delete('FILE_SURAT_TANGGAPAN', $update->PROPOSAL_SURAT_TANGGAPAN); }
            $update->PROPOSAL_SURAT_TANGGAPAN     = Filestorage::upload('FILE_SURAT_TANGGAPAN', $request->file('surattanggapan'));
            $update->PROPOSAL_STATUS = 'Revisi Proposal';
            $update->save();

            $responseData = [
                'status_code' => 200,
                'message' => 'Berhasil upload Surat',
            ];
            
            return response()->json($responseData, 200);
        }else{
            $responseData = [
                'status_code' => 200,
                'message' => 'Data tidak ditemukan',
            ];
            
            return response()->json($responseData, 200);

        }
    }

    public function batalkan($idproposal){
        $update = proposal::findorfail($idproposal);

        $existsdata = $update !== null;

        if($existsdata == true){
            if($update->PROPOSAL_SURAT_PENOLAKAN != null){

                Storage::disk('local')->delete('/FILE_SURAT_PENOLAKAN/' . $update->PROPOSAL_SURAT_PENOLAKAN);

                // $update->PROPOSAL_STATUS = 'Penolakan Dibatalkan';
                $update->PROPOSAL_SURAT_PENOLAKAN = null;
                $update->save();

                session()->flash('keyword', 'TambahData');
                session()->flash('pesan', 'Ada data hapus file jadikan null');
                return redirect('/antrian-proposal');

            }else{
                session()->flash('keyword', 'Alert');
                session()->flash('pesan', 'Tidak ada surat');
                return redirect('/antrian-proposal');
            }

        }else{
            session()->flash('keyword', 'Alert');
            session()->flash('pesan', 'Data tidak ditemukan');
            return redirect('/antrian-proposal');

        }
    }

    public function izin(Request $request)
    {
        $rule = [
            'suratizin' => ['required','max:2048', 'mimes:pdf'],
        ];

        $pesan = [
            'suratizin.required' => 'Kolom harus diisi.',
            'suratizin.max' => 'Kolom ini maksimal :max .',
            'suratizin.mimes' => 'Kolom ini harus berupa file dengan ekstensi pdf.',
        ];

        $validator = Validator::make($request->all(), $rule, $pesan);

        if ($validator->fails()) {
            // return redirect()->route('create-event')->withErrors($validator)->withInput($request->all());

            return response()->json([
                'status_code' => 422, //422 | server meresponse tapi validasi tidak lolos
                'errors' => $validator->errors(),
            ]);
        }

        $update = proposal::where('PROPOSAL_ID', $request->keyizin)->first();
        // return response($update);
        $existsdata = $update !== null;
        
        if($existsdata == true){

            if($update->PROPOSAL_STATUS == 'Verifikasi dan Menunggu Draft Izin Penelitian'){
                
                if($update->PROPOSAL_IZIN_PENELITIAN_DRAFT != null){ Filestorage::delete('FILE_SURAT_IZIN_PENELITIAN_DRAFT', $update->PROPOSAL_IZIN_PENELITIAN_DRAFT); }
                $update->PROPOSAL_IZIN_PENELITIAN_DRAFT     = Filestorage::upload('FILE_SURAT_IZIN_PENELITIAN_DRAFT', $request->file('suratizin'));
                $update->PROPOSAL_TAHAPAN                   = '4';
                $update->PROPOSAL_STATUS                    = 'Pelaksanaan Penelitian';

            }else if($update->PROPOSAL_STATUS == 'Verifikasi Akhir'){

                if($update->PROPOSAL_IZIN_PENELITIAN != null){ Filestorage::delete('FILE_SURAT_IZIN_PENELITIAN', $update->PROPOSAL_IZIN_PENELITIAN); }
                $update->PROPOSAL_IZIN_PENELITIAN     = Filestorage::upload('FILE_SURAT_IZIN_PENELITIAN', $request->file('suratizin'));
                $update->PROPOSAL_STATUS              = 'Penelitian Selesai';
            }

            $update->save();
            
            $responseData = [
                'status_code' => 200,
                'message' => 'Berhasil upload Surat',
            ];
            
            return response()->json($responseData, 200);

        }else{
            $responseData = [
                'status_code' => 200,
                'message' => 'Data tidak ditemukan',
            ];
            
            return response()->json($responseData, 200);

        }
    }

    public function batalperizinan($idproposal){
        $update = proposal::findorfail($idproposal);

        $existsdata = $update !== null;

        if($existsdata == true){
            if($update->PROPOSAL_IZIN_PENELITIAN_DRAFT != null || $update->PROPOSAL_IZIN_PENELITIAN != null){

                if($update->PROPOSAL_STATUS == 'Pelaksanaan Penelitian'){
                    Filestorage::delete('FILE_SURAT_IZIN_PENELITIAN_DRAFT', $update->PROPOSAL_IZIN_PENELITIAN_DRAFT);
                    // $update->PROPOSAL_STATUS = 'Draft Izin Penelitian Dibatalkan';
                    $update->PROPOSAL_IZIN_PENELITIAN_DRAFT = null;
                    
                }else if($update->PROPOSAL_STATUS == 'Dokumen Akhir'){
                    
                    Filestorage::delete('FILE_SURAT_IZIN_PENELITIAN', $update->PROPOSAL_IZIN_PENELITIAN);
                    // $update->PROPOSAL_STATUS = 'Izin Penelitian resmi Dibatalkan';
                    $update->PROPOSAL_IZIN_PENELITIAN = null;
                }
                $update->save();

                session()->flash('keyword', 'TambahData');
                session()->flash('pesan', 'Dibatalkan');
                return redirect('/antrian-proposal');

            }else{
                session()->flash('keyword', 'Alert');
                session()->flash('pesan', 'Tidak ada surat');
                return redirect('/antrian-proposal');
            }

        }else{
            session()->flash('keyword', 'Alert');
            session()->flash('pesan', 'Data tidak ditemukan');
            return redirect('/antrian-proposal');

        }
    }

    public function jadwalpresentasi(Request $request){
        // return response($request->all());

        $rule = [
            'tanggal_presentasi' => ['required'],
            'kategori_acara' => ['required'],
            'media_presentasi' => ['required'],
        ];

        $pesan = [
            'tanggal_presentasi.required' => 'Kolom harus diisi.',
            'kategori_acara.required' => 'Kolom harus diisi.',
            'media_presentasi.required' => 'Kolom harus diisi.',
        ];

        $validator = Validator::make($request->all(), $rule, $pesan);

        if ($validator->fails()) {
            // return redirect()->route('create-event')->withErrors($validator)->withInput($request->all());

            return response()->json([
                'status_code' => 422, //422 | server meresponse tapi validasi tidak lolos
                'errors' => $validator->errors(),
            ]);
        }

        $update = proposal::where('PROPOSAL_ID', $request->pengajuan_jadwal)->first();
        // return response($update);
        $existsdata = $update !== null;
        
        if($existsdata == true){

            $update->PROPOSAL_TANGGAL_PRESENTASI  = $request->tanggal_presentasi;
            $update->PROPOSAL_KATEGORI_PRESENTASI = $request->kategori_acara;
            $update->PROPOSAL_MEDIA_PRESENTASI    = $request->media_presentasi;
            $update->save();
            
            $responseData = [
                'status_code' => 200,
                'message' => 'Berhasil simpan data jadwal presentasi',
            ];
            
            return response()->json($responseData, 200);

        }else{
            $responseData = [
                'status_code' => 200,
                'message' => 'Data tidak ditemukan',
            ];
            
            return response()->json($responseData, 200);

        }
    }

    public function show($id){
        $data = proposal::find($id); 

        return view('module/admin/OP_antrian_proposal/show', [
            'data' => $data
        ]);
    }

    private function uploadFilePengajuanPenelitian($file_upload, $patch) {
        $filename = null;
        if ($file_upload) {
            $file           = $file_upload; 
            $path           = $file->store($patch, 'local'); // proses upload file
            $randomfilename = basename($path);
            $name           = date('dmY').time().'_'.$file->getClientOriginalName();

            $filename = $name;
        }

        return $filename;
    }

    
}
