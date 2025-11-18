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
        $data = proposal::whereNotIn('proposal_status', ['Penelitian Selesai', 'Ditolak'])
                    ->orderBy('created_at','desc')
                    ->get(); 

        return view('module/admin/OP_antrian_proposal/index', [
            'pengajuanpenelitian' => $data
        ]);
    }

    // control update status peneliti
    public function update(Request $request, $id)
    {
        $update = proposal::where('id', $id)->first();
        $existsdata = $update !== null;

        if($existsdata == true){
            if($request->status == 'Verifikasi'){
                $update->proposal_tahapan = '1';
            }else if($request->status == 'Kelengkapan Dokumen'){
                $update->proposal_tahapan = '2';
            }else if($request->status == 'Administrasi'){
                $update->proposal_tahapan = '3';      
            }else if($request->status == 'Pelaksanaan Penelitian'){
                $update->proposal_tahapan = '4';      
            }else if($request->status == 'Dokumen Akhir'){
                $update->proposal_tahapan = '5';
            }
            $update->proposal_status = $request->status;
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

        $update = proposal::where('id', $request->pengajuann)->first();
        $existsdata = $update !== null;

        if($existsdata == true){
            if($update->proposal_surat_penolakan != null){ Filestorage::delete('FILE_SURAT_PENOLAKAN', $update->proposal_surat_penolakan); }
            $update->proposal_surat_penolakan     = Filestorage::upload('FILE_SURAT_PENOLAKAN', $request->file('suratpenolakan'));
            $update->proposal_status = 'Ditolak';
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

        $update = proposal::where('id', $request->pengajuann)->first();
        $existsdata = $update !== null;

        if($existsdata == true){
            if($update->proposal_surat_tanggapan != null){ Filestorage::delete('FILE_SURAT_TANGGAPAN', $update->proposal_surat_tanggapan); }
            $update->proposal_surat_tanggapan     = Filestorage::upload('FILE_SURAT_TANGGAPAN', $request->file('surattanggapan'));
            $update->proposal_status = 'Revisi Proposal';
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
            if($update->proposal_surat_penolakan != null){

                Storage::disk('local')->delete('/FILE_SURAT_PENOLAKAN/' . $update->proposal_surat_penolakan);

                // $update->proposal_status = 'Penolakan Dibatalkan';
                $update->proposal_surat_penolakan = null;
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

        $update = proposal::where('id', $request->keyizin)->first();
        // return response($update);
        $existsdata = $update !== null;
        
        if($existsdata == true){

            if($update->proposal_status == 'Verifikasi dan Menunggu Draft Izin Penelitian'){
                
                if($update->proposal_izin_penelitian_draft != null){ Filestorage::delete('FILE_SURAT_IZIN_PENELITIAN_DRAFT', $update->proposal_izin_penelitian_draft); }
                $update->proposal_izin_penelitian_draft     = Filestorage::upload('FILE_SURAT_IZIN_PENELITIAN_DRAFT', $request->file('suratizin'));
                $update->proposal_tahapan                   = '4';
                $update->proposal_status                    = 'Pelaksanaan Penelitian';

            }else if($update->proposal_status == 'Verifikasi Akhir'){

                if($update->proposal_izin_penelitian != null){ Filestorage::delete('FILE_SURAT_IZIN_PENELITIAN', $update->proposal_izin_penelitian); }
                $update->proposal_izin_penelitian     = Filestorage::upload('FILE_SURAT_IZIN_PENELITIAN', $request->file('suratizin'));
                $update->proposal_status              = 'Penelitian Selesai';
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
            if($update->proposal_izin_penelitian_draft != null || $update->proposal_izin_penelitian != null){

                if($update->proposal_status == 'Pelaksanaan Penelitian'){
                    Filestorage::delete('FILE_SURAT_IZIN_PENELITIAN_DRAFT', $update->proposal_izin_penelitian_draft);
                    // $update->proposal_status = 'Draft Izin Penelitian Dibatalkan';
                    $update->proposal_izin_penelitian_draft = null;
                    
                }else if($update->proposal_status == 'Dokumen Akhir'){
                    
                    Filestorage::delete('FILE_SURAT_IZIN_PENELITIAN', $update->proposal_izin_penelitian);
                    // $update->proposal_status = 'Izin Penelitian resmi Dibatalkan';
                    $update->proposal_izin_penelitian = null;
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

        $update = proposal::where('id', $request->pengajuan_jadwal)->first();
        // return response($update);
        $existsdata = $update !== null;
        
        if($existsdata == true){

            $update->proposal_tanggal_presentasi  = $request->tanggal_presentasi;
            $update->proposal_kategori_presentasi = $request->kategori_acara;
            $update->proposal_media_presentasi    = $request->media_presentasi;
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
