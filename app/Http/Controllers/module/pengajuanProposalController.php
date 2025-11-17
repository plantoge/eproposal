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
        $file = historyFile::where('HISTORY_PROPOSAL_ID', $request->pengajuan)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('module/admin/ajaxview/get_history_proposal', compact('file'));
    }

    public function index()
    {   
        // $cek = Mail::to('arsipfauzi@gmail.com')->send(new SampleEmail());
        
        $data = proposal::where('proposal.PROPOSAL_USER_ID', Auth::user()->id)
            ->whereNotIn('PROPOSAL_STATUS', ['Penelitian Selesai', 'Ditolak'])
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

        // lolos validasi
        $generate = $this->generadeCode();
        $store = new proposal();
        $store->PROPOSAL_NOMOR               = $generate['nomor'];
        $store->PROPOSAL_KODE                = $generate['kode'];
        $store->PROPOSAL_PENELITI_UTAMA      = $request->peneliti_utama;
        $store->PROPOSAL_TIM_PENELITI        = $request->tim_peneliti;
        $store->PROPOSAL_JUDUL_PENELITIAN    = $request->judul_penelitian;
        $store->PROPOSAL_SURAT_PENGANTAR     = Filestorage::upload('FILE_SURAT_PENGANTAR', $request->file('surat_pengantar'));
        $store->PROPOSAL_PROPOSAL_PENELITIAN = Filestorage::upload('FILE_PROPOSAL_PENELITIAN', $request->file('proposal_penelitian'));
        $store->PROPOSAL_KAJI_ETIK           = Filestorage::upload('FILE_KAJI_ETIK', $request->file('kaji_etik'));
        $store->PROPOSAL_SERTIFIKAT_GCP      = Filestorage::upload('FILE_SERTIFIKAT_GCP', $request->file('sertifikat_gcp'));
        $store->PROPOSAL_LAPORAN_PENELITIAN  = null;
        $store->PROPOSAL_RAW_DATA_PENELITIAN = null;
        $store->PROPOSAL_INSTITUSI_ASAL      = Auth::user()->institusi_asal;
        $store->PROPOSAL_EMAIL               = Auth::user()->email;
        $store->PROPOSAL_PHONE               = Auth::user()->phone;
        $store->PROPOSAL_USER_ID             = Auth::user()->id;
        $store->PROPOSAL_STATUS              = '-';
        $store->Save();

        $history = New historyFile();
        $history->HISTORY_PROPOSAL_ID = $store->PROPOSAL_ID;
        $history->HISTORY_FILE = $store->PROPOSAL_PROPOSAL_PENELITIAN;
        $history->HISTORY_KETERANGAN = 'Pengajuan Awal';
        $history->HISTORY_USER_ID = Auth::user()->id;
        $history->Save();

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
        $informasi = infokontak_model::find('001')->first();
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
        // dd($request->all(), $request->surat_pengantar == '');
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

        // lolos validasi
        $update = proposal::findorfail($id);

        if($request->proposal_penelitian){
            // simpan nama file proposal sebelumnya dulu
            $history = New historyFile();
            $history->HISTORY_PROPOSAL_ID = $id;
            $history->HISTORY_FILE = $update->PROPOSAL_PROPOSAL_PENELITIAN;
            $history->HISTORY_KETERANGAN = $update->PROPOSAL_STATUS;
            $history->HISTORY_USER_ID = Auth::user()->id;
            $history->Save();
            
            $update->PROPOSAL_PROPOSAL_PENELITIAN = Filestorage::upload('FILE_PROPOSAL_PENELITIAN', $request->file('proposal_penelitian'));
            
        }

        if($request->surat_pengantar){
            if($update->PROPOSAL_SURAT_PENGANTAR != null){ Filestorage::delete('FILE_SURAT_PENGANTAR', $update->PROPOSAL_SURAT_PENGANTAR); }
            $update->PROPOSAL_SURAT_PENGANTAR           = Filestorage::upload('FILE_SURAT_PENGANTAR', $request->file('surat_pengantar'));
        }

        if($request->kaji_etik){
            if($update->PROPOSAL_KAJI_ETIK != null){ Filestorage::delete('FILE_KAJI_ETIK', $update->PROPOSAL_KAJI_ETIK); }
            $update->PROPOSAL_KAJI_ETIK           = Filestorage::upload('FILE_KAJI_ETIK', $request->file('kaji_etik'));
        }

        if($request->sertifikat_gcp){
            if($update->PROPOSAL_SERTIFIKAT_GCP != null){ Filestorage::delete('FILE_SERTIFIKAT_GCP', $update->PROPOSAL_SERTIFIKAT_GCP); }
            $update->PROPOSAL_SERTIFIKAT_GCP      = Filestorage::upload('FILE_SERTIFIKAT_GCP', $request->file('sertifikat_gcp'));
        }
        

        // $update->PROPOSAL_PENELITI_UTAMA      = $request->peneliti_utama;
        // $update->PROPOSAL_TIM_PENELITI        = $request->tim_peneliti;
        // $update->PROPOSAL_JUDUL_PENELITIAN    = $request->judul_penelitian;
        $update->PROPOSAL_INSTITUSI_ASAL      = Auth::user()->institusi_asal;
        $update->PROPOSAL_EMAIL               = Auth::user()->email;
        $update->PROPOSAL_PHONE               = Auth::user()->phone;
        $update->PROPOSAL_USER_ID             = Auth::user()->id;
        $update->PROPOSAL_STATUS              = 'Verifikasi Revisi Proposal';
        $update->Save();

        $responseData = [
            'status_code' => 200,
            'message' => 'Data diperbaiki',
            'additionalData' => 'Nilai tambahan jika diperlukan.'
        ];
        
        $url = url('/antrian-proposal/'.$update->PROPOSAL_ID);
        $pesan ='<b class="fs-7">#'.$update->PROPOSAL_KODE.' sudah melakukan revisi proposal</b> <br> <a href="'.$url.'">Klik Disini</a> <br> <small>'.date('d-m-Y H:i:s').'</small>';
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

        $update = proposal::findorfail($id);

        if($request->file_kaji_etik_rspi){
            if($update->PROPOSAL_KAJI_ETIK_RSPI != null){ Filestorage::delete('FILE_KAJI_ETIK_RSPI', $update->PROPOSAL_KAJI_ETIK_RSPI); }
            $update->PROPOSAL_KAJI_ETIK_RSPI     = Filestorage::upload('FILE_KAJI_ETIK_RSPI', $request->file('file_kaji_etik_rspi'));
        }

        if($request->file_kerahasiaan){
            if($update->PROPOSAL_KERAHASIAAN != null){ Filestorage::delete('FILE_KERAHASIAAN', $update->PROPOSAL_KERAHASIAAN); }
            $update->PROPOSAL_KERAHASIAAN     = Filestorage::upload('FILE_KERAHASIAAN', $request->file('file_kerahasiaan'));
        }

        if($request->file_pks){
            if($update->PROPOSAL_PKS != null){ Filestorage::delete('FILE_PKS', $update->PROPOSAL_PKS); }
            $update->PROPOSAL_PKS     = Filestorage::upload('FILE_PKS', $request->file('file_pks'));
        }

        if($request->file_mta){
            if($update->PROPOSAL_MTA != null){ Filestorage::delete('FILE_MTA', $update->PROPOSAL_MTA); }
            $update->PROPOSAL_MTA     = Filestorage::upload('FILE_MTA', $request->file('file_mta'));
        }

        $update->PROPOSAL_INSTITUSI_ASAL      = Auth::user()->institusi_asal;
        $update->PROPOSAL_EMAIL               = Auth::user()->email;
        $update->PROPOSAL_PHONE               = Auth::user()->phone;
        $update->PROPOSAL_USER_ID             = Auth::user()->id;
        $update->PROPOSAL_STATUS              = 'Verifikasi Dokumen';
        $update->Save();

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

        $update = proposal::findorfail($id);

        if($request->file_bukti_transfer){
            if($update->PROPOSAL_BUKTI_BAYAR != null){ Filestorage::delete('FILE_BUKTI_BAYAR', $update->PROPOSAL_BUKTI_BAYAR); }
            $update->PROPOSAL_BUKTI_BAYAR     = Filestorage::upload('FILE_BUKTI_BAYAR', $request->file('file_bukti_transfer'));
        }

        $update->PROPOSAL_INSTITUSI_ASAL      = Auth::user()->institusi_asal;
        $update->PROPOSAL_EMAIL               = Auth::user()->email;
        $update->PROPOSAL_PHONE               = Auth::user()->phone;
        $update->PROPOSAL_USER_ID             = Auth::user()->id;
        $update->PROPOSAL_STATUS              = 'Verifikasi dan Menunggu Draft Izin Penelitian';
        $update->Save();

        $responseData = [
            'status_code' => 200,
            'message' => 'Berhasil',
            'additionalData' => 'Nilai tambahan jika diperlukan.'
        ];

        $url = url('/antrian-proposal/'.$update->PROPOSAL_ID);
        $pesan ='<b class="fs-7">#'.$update->PROPOSAL_KODE.' sudah upload bukti bayar</b> <br> <a href="'.$url.'">Klik Disini</a> <br> <small>'.date('d-m-Y H:i:s').'</small>';
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

        $update = proposal::findorfail($id);
        
        if($request->file_laporan_penelitian){
            if($update->PROPOSAL_LAPORAN_PENELITIAN != null){ Filestorage::delete('FILE_LAPORAN_PENELITIAN', $update->PROPOSAL_LAPORAN_PENELITIAN); }
            $update->PROPOSAL_LAPORAN_PENELITIAN     = Filestorage::upload('FILE_LAPORAN_PENELITIAN', $request->file('file_laporan_penelitian'));
        }

        if($request->file_raw_data){
            if($update->PROPOSAL_RAW_DATA_PENELITIAN != null){ Filestorage::delete('FILE_RAW_DATA_PENELITIAN', $update->PROPOSAL_RAW_DATA_PENELITIAN); }
            $update->PROPOSAL_RAW_DATA_PENELITIAN     = Filestorage::upload('FILE_RAW_DATA_PENELITIAN', $request->file('file_raw_data'));
        }

        $update->PROPOSAL_INSTITUSI_ASAL      = Auth::user()->institusi_asal;
        $update->PROPOSAL_EMAIL               = Auth::user()->email;
        $update->PROPOSAL_PHONE               = Auth::user()->phone;
        $update->PROPOSAL_USER_ID             = Auth::user()->id;
        $update->PROPOSAL_STATUS              = 'Verifikasi Akhir';
        $update->Save();

        $responseData = [
            'status_code' => 200,
            'message' => 'Berhasil',
            'additionalData' => 'Nilai tambahan jika diperlukan.'
        ];
        
        $url = url('/antrian-proposal/'.$update->PROPOSAL_ID);
        $pesan ='<b class="fs-7">#'.$update->PROPOSAL_KODE.' sudah upload hasil Laporan penelitian dan raw data</b> <br> <a href="'.$url.'">Klik Disini</a> <br> <small>'.date('d-m-Y H:i:s').'</small>';
        event(new notifRevisiProposalEvent($pesan));

        return response()->json($responseData, 200);
    }

    public function destroy(Request $request)
    {
        $data       = proposal::where('PROPOSAL_ID', $request->pengajuan)->first();
        $existsdata1 = $data !== null;

        if($existsdata1 == true){
            
            if($data->PROPOSAL_SURAT_PENGANTAR){ Filestorage::delete('/FILE_SURAT_PENGANTAR/', $data->PROPOSAL_SURAT_PENGANTAR); }
            if($data->PROPOSAL_PROPOSAL_PENELITIAN){ Filestorage::delete('/FILE_PROPOSAL_PENELITIAN/', $data->PROPOSAL_PROPOSAL_PENELITIAN); }
            if($data->PROPOSAL_KAJI_ETIK){ Filestorage::delete('/FILE_KAJI_ETIK/', $data->PROPOSAL_KAJI_ETIK); }
            if($data->PROPOSAL_SERTIFIKAT_GCP){ Filestorage::delete('/FILE_SERTIFIKAT_GCP/', $data->PROPOSAL_SERTIFIKAT_GCP); }
            if($data->PROPOSAL_KAJI_ETIK_RSPI){ Filestorage::delete('/FILE_KAJI_ETIK_RSPI/', $data->PROPOSAL_KAJI_ETIK_RSPI); }
            if($data->PROPOSAL_PKS){ Filestorage::delete('/FILE_PKS/', $data->PROPOSAL_PKS); }
            if($data->PROPOSAL_MTA){ Filestorage::delete('/FILE_MTA/', $data->PROPOSAL_MTA); }
            if($data->PROPOSAL_BUKTI_BAYAR){ Filestorage::delete('/FILE_BUKTI_BAYAR/', $data->PROPOSAL_BUKTI_BAYAR); }
            if($data->PROPOSAL_LAPORAN_PENELITIAN){ Filestorage::delete('/FILE_LAPORAN_PENELITIAN/', $data->PROPOSAL_LAPORAN_PENELITIAN); }
            if($data->PROPOSAL_RAW_DATA_PENELITIAN){ Filestorage::delete('/FILE_RAW_DATA_PENELITIAN/', $data->PROPOSAL_RAW_DATA_PENELITIAN); }
            if($data->PROPOSAL_IZIN_PENELITIAN_DRAFT){ Filestorage::delete('/FILE_SURAT_IZIN_PENELITIAN_DRAFT/', $data->PROPOSAL_IZIN_PENELITIAN_DRAFT); }
            if($data->PROPOSAL_IZIN_PENELITIAN){ Filestorage::delete('/FILE_SURAT_IZIN_PENELITIAN/', $data->PROPOSAL_IZIN_PENELITIAN); }
            if($data->PROPOSAL_SURAT_PENOLAKAN){ Filestorage::delete('/FILE_SURAT_PENOLAKAN/', $data->PROPOSAL_SURAT_PENOLAKAN); }
            
            $data->delete();

            $responseData = [
                'status_code' => 200,
                'message' => 'Data File terhapus',
            ];

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

        $cek = proposal::whereYear('created_at', date('Y'))->max('PROPOSAL_NOMOR');

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
