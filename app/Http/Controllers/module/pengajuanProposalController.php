<?php

namespace App\Http\Controllers\module;

use App\Events\notifRevisiProposalEvent;
use app\Helpers\Filestorage;
use App\Http\Controllers\Controller;
use App\Mail\SampleEmail;
use App\Model\historyFile;
use App\Model\infokontak_model;
use App\Model\laporanPenelitian;
use App\Model\proposal;
use App\Rules\CekFileJahatRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Telegram\Bot\Laravel\Facades\Telegram;

class pengajuanProposalController extends Controller
{
    public function testing_telegram() {
        // 6. Kirim pesan ke Telegram
        $chatId = '705776065';
        $message = "
            <b>Orderan Masuk #12345</b>
        ";

        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => $message,
        ]);
    }

    public function gethistoryproposal(Request $request)
    {
        $file = historyFile::where('history_proposal_id', $request->pengajuan)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('module/admin/ajaxview/get_history_proposal', compact('file'));
    }

    public function index()
    {   
        // $cek = Mail::to('arsipfauzi@gmail.com')->send(new SampleEmail());
        
        $data = proposal::where('proposal.proposal_user_id', Auth::user()->id)
            ->whereNotIn('proposal_status', ['Penelitian Selesai', 'Ditolak'])
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $totaldata = $data->total();

        return view('module/admin/VI_pengajuan_proposal/index', [
            'pengajuanpenelitian' => $data,
            'totaldata' =>$totaldata
        ]);
    }

    public function tesnotif(){

        event(new notifRevisiProposalEvent('<b class="fs-7">#12345 Testing Notifikasi berhasil</b>'));
    }

    public function create()
    {
        return view('module/admin/VI_pengajuan_proposal/create_wizard');
    }

    public function store(Request $request)
    {
        $rule = [
            'peneliti_utama' => ['required'],
            'tim_peneliti' => ['required'],
            'judul_penelitian' => ['required'],
            'surat_pengantar' => ['required', 'max:2048', 'mimes:pdf', new CekFileJahatRule()],
            'proposal_penelitian' => ['required', 'max:2048', 'mimes:pdf', new CekFileJahatRule()],
            'kaji_etik' => ['max:2048', 'mimes:pdf', new CekFileJahatRule()],
            'sertifikat_gcp' => ['max:2048', 'mimes:pdf', new CekFileJahatRule()],
        ];

        $pesan = [
            'peneliti_utama.required' => 'Kolom Peneliti Utama harus diisi.',
            'tim_peneliti.required' => 'Kolom Tim Peneliti harus diisi.',
            'judul_penelitian.required' => 'Kolom Judul Peneliti harus diisi.',
            'surat_pengantar.required' => 'Kolom ini harus diisi.',
            'surat_pengantar.max' => 'Kolom ini maksimal :max .',
            'surat_pengantar.mimes' => 'Kolom ini harus ekstensi pdf.',
            'proposal_penelitian.required' => 'Kolom ini harus diisi.',
            'proposal_penelitian.max' => 'Kolom ini maksimal :max .',
            'proposal_penelitian.mimes' => 'Kolom ini harus ekstensi pdf.',
            'kaji_etik.max' => 'Kolom ini maksimal :max .',
            'kaji_etik.mimes' => 'Kolom ini harus ekstensi pdf.',
            'sertifikat_gcp.max' => 'Kolom ini maksimal :max .',
            'sertifikat_gcp.mimes' => 'Kolom ini harus ekstensi pdf.',
        ];

        $validator = Validator::make($request->all(), $rule, $pesan);

        if ($validator->fails()) {
            // return redirect()->route('create-event')->withErrors($validator)->withInput($request->all());

            return response()->json([
                'status_code' => 422, //422 | server meresponse tapi validasi tidak lolos
                'errors' => $validator->errors(),
            ]);
        }

        DB::beginTransaction();

        // lolos validasi
        $generate = $this->generadeCode();
        $store = new proposal();
        $store->proposal_nomor               = $generate['nomor'];
        $store->proposal_kode                = $generate['kode'];
        $store->proposal_peneliti_utama      = $request->peneliti_utama;
        $store->proposal_tim_peneliti        = $request->tim_peneliti;
        $store->proposal_judul_penelitian    = $request->judul_penelitian;
        $store->proposal_surat_pengantar     = Filestorage::upload('FILE_SURAT_PENGANTAR', $request->file('surat_pengantar'));
        $store->proposal_proposal_penelitian = Filestorage::upload('FILE_PROPOSAL_PENELITIAN', $request->file('proposal_penelitian'));
        $store->proposal_kaji_etik           = Filestorage::upload('FILE_KAJI_ETIK', $request->file('kaji_etik'));
        $store->proposal_sertifikat_gcp      = Filestorage::upload('FILE_SERTIFIKAT_GCP', $request->file('sertifikat_gcp'));
        $store->proposal_laporan_penelitian  = null;
        $store->proposal_raw_data_penelitian = null;
        $store->proposal_institusi_asal      = Auth::user()->institusi_asal;
        $store->proposal_email               = Auth::user()->email;
        $store->proposal_phone               = Auth::user()->phone;
        $store->proposal_user_id             = Auth::user()->id;
        $store->proposal_status              = '-';
        $store->Save();

        $history = New historyFile();
        $history->history_proposal_id = $store->id;
        $history->history_file = $store->proposal_proposal_penelitian;
        $history->history_keterangan = 'Pengajuan Awal';
        $history->history_user_id = Auth::user()->id;
        $history->Save();

        DB::commit();
        
        $responseData = [
            'status_code' => 200,
            'message' => 'Data sudah di ajukan',
            'additionalData' => 'Nilai tambahan jika diperlukan.'
        ];
        
        return response()->json($responseData, 200);
    }

    public function progress($id)
    {
        $proposal = proposal::findorfail($id);
        $informasi = infokontak_model::latest()->first();
        return view('module/admin/VI_pengajuan_proposal/create_wizard_progress', [
            'proposal' => $proposal,
            'informasi' => $informasi,
        ]);
    }

    public function edit($id)
    {
        $data = proposal::find($id);   
        return view('module/admin/VI_pengajuan_proposal/edit', [
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $rule = [
            'proposal_penelitian' => ['required', 'max:2048', 'mimes:pdf', new CekFileJahatRule()],
            'surat_pengantar' => ['max:2048', 'mimes:pdf', new CekFileJahatRule()],
            'surat_pengantar' => ['max:2048', 'mimes:pdf', new CekFileJahatRule()],
        ];

        $pesan = [
            // 'peneliti_utama.required' => 'Kolom Peneliti Utama harus diisi.',
            // 'tim_peneliti.required' => 'Kolom Tim Peneliti harus diisi.',
            // 'judul_penelitian.required' => 'Kolom Judul Peneliti harus diisi.',
            'surat_pengantar.max' => 'Kolom ini maksimal :max .',
            'surat_pengantar.mimes' => 'Kolom ini harus berupa file dengan ekstensi pdf.',
            'proposal_penelitian.required' => 'Kolom Judul Peneliti harus diisi.',
            'proposal_penelitian.max' => 'Kolom ini maksimal :max .',
            'proposal_penelitian.mimes' => 'Kolom ini harus berupa file dengan ekstensi pdf.',
        ];

        $validator = Validator::make($request->all(), $rule, $pesan);

        if ($validator->fails()) {
            // return redirect()->route('create-event')->withErrors($validator)->withInput($request->all());

            return response()->json([
                'status_code' => 422, //422 | server meresponse tapi validasi tidak lolos
                'errors' => $validator->errors(),
            ]);
        }

        DB::beginTransaction();
        // lolos validasi
        $update = proposal::findorfail($id);

        if($request->proposal_penelitian){
            // simpan nama file proposal sebelumnya dulu
            $history = New historyFile();
            $history->history_proposal_id = $id;
            $history->history_file = $update->proposal_proposal_penelitian;
            $history->history_keterangan = $update->proposal_status;
            $history->history_user_id = Auth::user()->id;
            $history->Save();
            
            $update->proposal_proposal_penelitian = Filestorage::upload('FILE_PROPOSAL_PENELITIAN', $request->file('proposal_penelitian'));
            
        }

        if($request->surat_pengantar){
            if($update->proposal_surat_pengantar != null){ Filestorage::delete('FILE_SURAT_PENGANTAR', $update->proposal_surat_pengantar); }
            $update->proposal_surat_pengantar           = Filestorage::upload('FILE_SURAT_PENGANTAR', $request->file('surat_pengantar'));
        }

        if($request->kaji_etik){
            if($update->proposal_kaji_etik != null){ Filestorage::delete('FILE_KAJI_ETIK', $update->proposal_kaji_etik); }
            $update->proposal_kaji_etik           = Filestorage::upload('FILE_KAJI_ETIK', $request->file('kaji_etik'));
        }

        if($request->sertifikat_gcp){
            if($update->proposal_sertifikat_gcp != null){ Filestorage::delete('FILE_SERTIFIKAT_GCP', $update->proposal_sertifikat_gcp); }
            $update->proposal_sertifikat_gcp      = Filestorage::upload('FILE_SERTIFIKAT_GCP', $request->file('sertifikat_gcp'));
        }
        

        // $update->proposal_peneliti_utama      = $request->peneliti_utama;
        // $update->proposal_tim_peneliti        = $request->tim_peneliti;
        // $update->proposal_judul_penelitian    = $request->judul_penelitian;
        $update->proposal_institusi_asal      = Auth::user()->institusi_asal;
        $update->proposal_email               = Auth::user()->email;
        $update->proposal_phone               = Auth::user()->phone;
        $update->proposal_user_id             = Auth::user()->id;
        $update->proposal_status              = 'Verifikasi Revisi Proposal';
        $update->Save();

        DB::commit();

        $responseData = [
            'status_code' => 200,
            'message' => 'Data diperbaiki',
            'additionalData' => 'Nilai tambahan jika diperlukan.'
        ];
        
        $url = url('/antrian-proposal/'.$update->id);
        $pesan ='<b class="fs-7">#'.$update->proposal_kode.' sudah melakukan revisi proposal</b> <br> <a href="'.$url.'">Klik Disini</a> <br> <small>'.date('d-m-Y H:i:s').'</small>';
        event(new notifRevisiProposalEvent($pesan));
        
        return response()->json($responseData, 200);
    }

    public function tahap2(Request $request, $id)
    {
        $rule = [
            'file_kaji_etik_rspi' => ['required', 'max:2048', 'mimes:pdf', new CekFileJahatRule()],
            'file_kerahasiaan' => ['required', 'max:2048', 'mimes:pdf', new CekFileJahatRule()],
            'file_pks' => ['max:2048', 'mimes:pdf', new CekFileJahatRule()],
            'file_mta' => ['max:2048', 'mimes:pdf', new CekFileJahatRule()],
        ];

        $pesan = [
            'file_kaji_etik_rspi.required' => 'Kolom ini harus diisi.',
            'file_kaji_etik_rspi.max' => 'Kolom ini maksimal :max .',
            'file_kaji_etik_rspi.mimes' => 'Kolom ini harus berupa file dengan ekstensi pdf.',
            'file_kerahasiaan.required' => 'Kolom ini harus diisi.',
            'file_kerahasiaan.max' => 'Kolom ini maksimal :max .',
            'file_kerahasiaan.mimes' => 'Kolom ini harus berupa file dengan ekstensi pdf.',
            'file_pks.max' => 'Kolom ini maksimal :max .',
            'file_pks.mimes' => 'Kolom ini harus berupa file dengan ekstensi pdf.',
            'file_mta.max' => 'Kolom ini maksimal :max .',
            'file_mta.mimes' => 'Kolom ini harus berupa file dengan ekstensi pdf.',
        ];

        $validator = Validator::make($request->all(), $rule, $pesan);

        if ($validator->fails()) {
            // return redirect()->route('create-event')->withErrors($validator)->withInput($request->all());

            return response()->json([
                'status_code' => 422, //422 | server meresponse tapi validasi tidak lolos
                'errors' => $validator->errors(),
            ]);
        }

        DB::beginTransaction();

        $update = proposal::findorfail($id);

        if($request->file_kaji_etik_rspi){
            if($update->proposal_kaji_etik_rspi != null){ Filestorage::delete('FILE_KAJI_ETIK_RSPI', $update->proposal_kaji_etik_rspi); }
            $update->proposal_kaji_etik_rspi     = Filestorage::upload('FILE_KAJI_ETIK_RSPI', $request->file('file_kaji_etik_rspi'));
        }

        if($request->file_kerahasiaan){
            if($update->proposal_kerahasiaan != null){ Filestorage::delete('FILE_KERAHASIAAN', $update->proposal_kerahasiaan); }
            $update->proposal_kerahasiaan     = Filestorage::upload('FILE_KERAHASIAAN', $request->file('file_kerahasiaan'));
        }

        if($request->file_pks){
            if($update->proposal_pks != null){ Filestorage::delete('FILE_PKS', $update->proposal_pks); }
            $update->proposal_pks     = Filestorage::upload('FILE_PKS', $request->file('file_pks'));
        }

        if($request->file_mta){
            if($update->proposal_mta != null){ Filestorage::delete('FILE_MTA', $update->proposal_mta); }
            $update->proposal_mta     = Filestorage::upload('FILE_MTA', $request->file('file_mta'));
        }

        $update->proposal_institusi_asal      = Auth::user()->institusi_asal;
        $update->proposal_email               = Auth::user()->email;
        $update->proposal_phone               = Auth::user()->phone;
        $update->proposal_user_id             = Auth::user()->id;
        $update->proposal_status              = 'Verifikasi Dokumen';
        $update->Save();

        DB::commit();

        $responseData = [
            'status_code' => 200,
            'message' => 'Berhasil',
            'additionalData' => 'Nilai tambahan jika diperlukan.'
        ];
        
        return response()->json($responseData, 200);
    }

    public function tahap3(Request $request, $id)
    {
        $rule = [
            'file_bukti_transfer' => ['required', 'max:2048', 'mimes:jpg,jpeg,pdf', new CekFileJahatRule()],
        ];

        $pesan = [
            'file_bukti_transfer.required' => 'Kolom ini harus diisi.',
            'file_bukti_transfer.max' => 'Kolom ini maksimal :max .',
            'file_bukti_transfer.mimes' => 'Kolom ini harus berupa file dengan ekstensi jpg,jpeg,pdf .',
        ];

        $validator = Validator::make($request->all(), $rule, $pesan);

        if ($validator->fails()) {
            // return redirect()->route('create-event')->withErrors($validator)->withInput($request->all());

            return response()->json([
                'status_code' => 422, //422 | server meresponse tapi validasi tidak lolos
                'errors' => $validator->errors(),
            ]);
        }

        DB::beginTransaction();

        $update = proposal::findorfail($id);

        if($request->file_bukti_transfer){
            if($update->proposal_bukti_bayar != null){ Filestorage::delete('FILE_BUKTI_BAYAR', $update->proposal_bukti_bayar); }
            $update->proposal_bukti_bayar     = Filestorage::upload('FILE_BUKTI_BAYAR', $request->file('file_bukti_transfer'));
        }

        $update->proposal_institusi_asal      = Auth::user()->institusi_asal;
        $update->proposal_email               = Auth::user()->email;
        $update->proposal_phone               = Auth::user()->phone;
        $update->proposal_user_id             = Auth::user()->id;
        $update->proposal_status              = 'Verifikasi dan Menunggu Draft Izin Penelitian';
        $update->Save();

        $responseData = [
            'status_code' => 200,
            'message' => 'Berhasil',
            'additionalData' => 'Nilai tambahan jika diperlukan.'
        ];

        DB::commit();

        $url = url('/antrian-proposal/'.$update->id);
        $pesan ='<b class="fs-7">#'.$update->proposal_kode.' sudah upload bukti bayar</b> <br> <a href="'.$url.'">Klik Disini</a> <br> <small>'.date('d-m-Y H:i:s').'</small>';
        event(new notifRevisiProposalEvent($pesan));
        
        return response()->json($responseData, 200);
    }

    public function tahap4(Request $request, $id)
    {
        $rule = [
            'file_laporan_penelitian' => ['required', 'max:2048', 'mimes:pdf', new CekFileJahatRule()],
            'file_raw_data' => ['required', 'max:2560', 'mimes:xlsx,xls', new CekFileJahatRule()],
        ];

        $pesan = [
            'file_laporan_penelitian.required' => 'Kolom ini harus diisi.',
            'file_laporan_penelitian.max' => 'Kolom ini maksimal :max .',
            'file_laporan_penelitian.mimes' => 'Kolom ini harus berupa file dengan ekstensi pdf.',
            'file_raw_data.required' => 'Kolom ini harus diisi.',
            'file_raw_data.max' => 'Kolom ini maksimal :max .',
            'file_raw_data.mimes' => 'Kolom ini harus berupa file dengan ekstensi excel.',
        ];

        $validator = Validator::make($request->all(), $rule, $pesan);

        if ($validator->fails()) {
            // return redirect()->route('create-event')->withErrors($validator)->withInput($request->all());

            return response()->json([
                'status_code' => 422, //422 | server meresponse tapi validasi tidak lolos
                'errors' => $validator->errors(),
            ]);
        }

        DB::beginTransaction();

        $update = proposal::findorfail($id);
        
        if($request->file_laporan_penelitian){
            if($update->proposal_laporan_penelitian != null){ Filestorage::delete('FILE_LAPORAN_PENELITIAN', $update->proposal_laporan_penelitian); }
            $update->proposal_laporan_penelitian     = Filestorage::upload('FILE_LAPORAN_PENELITIAN', $request->file('file_laporan_penelitian'));
        }

        if($request->file_raw_data){
            if($update->proposal_raw_data_penelitian != null){ Filestorage::delete('FILE_RAW_DATA_PENELITIAN', $update->proposal_raw_data_penelitian); }
            $update->proposal_raw_data_penelitian     = Filestorage::upload('FILE_RAW_DATA_PENELITIAN', $request->file('file_raw_data'));
        }

        $update->proposal_institusi_asal      = Auth::user()->institusi_asal;
        $update->proposal_email               = Auth::user()->email;
        $update->proposal_phone               = Auth::user()->phone;
        $update->proposal_user_id             = Auth::user()->id;
        $update->proposal_status              = 'Verifikasi Akhir';
        $update->save();

        DB::commit();

        $responseData = [
            'status_code' => 200,
            'message' => 'Berhasil',
            'additionalData' => 'Nilai tambahan jika diperlukan.'
        ];
        
        $url = url('/antrian-proposal/'.$update->id);
        $pesan ='<b class="fs-7">#'.$update->proposal_kode.' sudah upload hasil Laporan penelitian dan raw data</b> <br> <a href="'.$url.'">Klik Disini</a> <br> <small>'.date('d-m-Y H:i:s').'</small>';
        event(new notifRevisiProposalEvent($pesan));

        return response()->json($responseData, 200);
    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();
        
        $data       = proposal::where('id', $request->pengajuan)->first();
        $existsdata1 = $data !== null;

        if($existsdata1 == true){
            
            if($data->proposal_surat_pengantar){ Filestorage::delete('/FILE_SURAT_PENGANTAR/', $data->proposal_surat_pengantar); }
            if($data->proposal_proposal_penelitian){ Filestorage::delete('/FILE_PROPOSAL_PENELITIAN/', $data->proposal_proposal_penelitian); }
            if($data->proposal_kaji_etik){ Filestorage::delete('/FILE_KAJI_ETIK/', $data->proposal_kaji_etik); }
            if($data->proposal_sertifikat_gcp){ Filestorage::delete('/FILE_SERTIFIKAT_GCP/', $data->proposal_sertifikat_gcp); }
            if($data->proposal_kaji_etik_rspi){ Filestorage::delete('/FILE_KAJI_ETIK_RSPI/', $data->proposal_kaji_etik_rspi); }
            if($data->proposal_pks){ Filestorage::delete('/FILE_PKS/', $data->proposal_pks); }
            if($data->proposal_mta){ Filestorage::delete('/FILE_MTA/', $data->proposal_mta); }
            if($data->proposal_bukti_bayar){ Filestorage::delete('/FILE_BUKTI_BAYAR/', $data->proposal_bukti_bayar); }
            if($data->proposal_laporan_penelitian){ Filestorage::delete('/FILE_LAPORAN_PENELITIAN/', $data->proposal_laporan_penelitian); }
            if($data->proposal_raw_data_penelitian){ Filestorage::delete('/FILE_RAW_DATA_PENELITIAN/', $data->proposal_raw_data_penelitian); }
            if($data->proposal_izin_penelitian_draft){ Filestorage::delete('/FILE_SURAT_IZIN_PENELITIAN_DRAFT/', $data->proposal_izin_penelitian_draft); }
            if($data->proposal_izin_penelitian){ Filestorage::delete('/FILE_SURAT_IZIN_PENELITIAN/', $data->proposal_izin_penelitian); }
            if($data->proposal_surat_penolakan){ Filestorage::delete('/FILE_SURAT_PENOLAKAN/', $data->proposal_surat_penolakan); }
            
            $data->delete();

            

            $responseData = [
                'status_code' => 200,
                'message' => 'Data File terhapus',
            ];

            DB::commit();

            return response()->json($responseData, 200);
        }else{

            $responseData = [
                'status_code' => 404,
                'message' => 'Data tidak ditemukan',
            ];

            return response()->json($responseData, 200);
        }
    }

    private function uploadFilePengajuanPenelitian($file_upload, $patch) {
        $filename = null;
        if ($file_upload) {

            $file           = $file_upload; 
            $path           = $file->store($patch, 'local'); // proses upload file

            $randomfilename = basename($path);
            $name           = date('dmYHis').'_'.$file->getClientOriginalName();

            $filename = $name;

            $disk             = Storage::disk('local'); //sftp
                $file         = $file_upload;
                $name         = date('dmYHis').'_'.$file->getClientOriginalName();
                $filePath     = '/tagihan_checklist/kontrak/' . $name .'.'. $file->getClientOriginalExtension(); // Menentukan jalur dan nama file tujuan di server FTP
                $fileContents = file_get_contents($file->getRealPath()); // Membaca isi file menjadi string
                $nama_file    = $name .'.'. $file->getClientOriginalExtension();
            $disk->put($filePath, $fileContents);

        }

        return $filename;
    }

    private function generadeCode() {
        // cara satu
        // $letters = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        // $digits = '123456789';
    
        // $randomLetters = substr(str_shuffle($letters), 0, 2);
        // $randomDigits = substr(str_shuffle($digits), 0, 5);
    
        // $randomCode = $randomLetters . $randomDigits;
    
        // return $randomCode;

        $cek = proposal::whereYear('created_at', date('Y'))->max('proposal_nomor');

        if($cek == null) {
            $nomor = 1;
            $kode = 'RSPISS' . str_pad($nomor, 3, "0", STR_PAD_LEFT);
        }else {
            $nomor = $cek + 1; 
            $kode = 'RSPISS' . str_pad($nomor, 3, "0", STR_PAD_LEFT);
        }

        $data = [
            'nomor' => $nomor,
            'kode' => $kode,
        ];
        return $data;
    }
}
