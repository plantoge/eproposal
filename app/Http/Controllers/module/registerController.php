<?php

namespace App\Http\Controllers\module;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class registerController extends Controller
{
    public function index()
    {
        if(Auth::check() == true){
            return redirect('panel');
        }
        
        $google2fa = app('pragmarx.google2fa');
        $google2fa_secret = $google2fa->generateSecretKey();

        $QR_Image = $google2fa->getQRCodeInline(
            config('app.name'),
            'arsipfauzi@gmail.com',
            $google2fa_secret
        );

        return view('layout/website/auth/masterRegister', [
            'QR_Image' => $QR_Image,
            'google2fa_secret' => $google2fa_secret
        ]);
    }

    public function verifikasipendaftaran(Request $request)
    {
        $rule = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:20'],
            'institusi_asal' => ['required', 'string'],
            'jk' => ['required', 'string'],
        ];

        $pesan = [
            'name.required' => 'Kolom nama harus diisi.',
            'name.max' => 'Panjang nama maksimal :max karakter.',
            'email.required' => 'Kolom email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Kolom password harus diisi.',
            'password.min' => 'Panjang password minimal :min karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'phone.required' => 'Kolom WhatsApp harus diisi.',
            'institusi_asal.required' => 'Kolom Institusi Asal harus diisi.',
            'jk.required' => 'Kolom identitas harus diisi.',
        ];

        $validator = Validator::make($request->all(), $rule, $pesan);

        if ($validator->fails()) {
            return response()->json([
                'status_code' => 422, //422 | server meresponse tapi validasi tidak lolos
                'errors' => $validator->errors(),
            ]);
        }

        DB::beginTransaction();

        $store = New User();
        $store->id = Uuid::uuid4()->toString();
        $store->status_user = 'visitor';
        $store->name = $request['name'];
        $store->username = $request['email'];
        $store->password = bcrypt($request['password']);
        $store->email = $request['email'];
        $store->phone = $request['phone'];
        $store->institusi_asal = $request['institusi_asal'];
        $store->jk = $request['jk'];
        $store->kategori_pendidikan = $request['kategori_pendidikan'];
        $store->save();
        
        // masukkan ke assign role visitor
        $role = 'visitor';
        $user = User::find($store->id);
        $user->assignRole($role);
        
        DB::commit();

        $responseData = [
            'status_code' => 200,
            'message' => 'Pendaftaran berhasil silahkan login',
        ];
        
        return response()->json($responseData, 200);
        
        // Logic for successful validation
        // session()->flash('keyword', 'TambahData');
        // session()->flash('pesan', 'Berhasil Daftar akun');
        // return redirect('/auth-sign-in');
    }

    // public function verifikasipendaftaran(Request $request)
    // {
    //     $rule = [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //         'phone' => ['required', 'string', 'max:20'],
    //         'institusi_asal' => ['required', 'string'],
    //         'jk' => ['required', 'string'],
    //     ];

    //     $pesan = [
    //         'name.required' => 'Kolom nama harus diisi.',
    //         'name.max' => 'Panjang nama maksimal :max karakter.',
    //         'email.required' => 'Kolom email harus diisi.',
    //         'email.email' => 'Format email tidak valid.',
    //         'password.required' => 'Kolom password harus diisi.',
    //         'password.min' => 'Panjang password minimal :min karakter.',
    //         'password.confirmed' => 'Konfirmasi password tidak cocok.',
    //         'phone.required' => 'Kolom WhatsApp harus diisi.',
    //         'institusi_asal.required' => 'Kolom Institusi Asal harus diisi.',
    //         'jk.required' => 'Kolom identitas harus diisi.',
    //     ];

    //     $validator = Validator::make($request->all(), $rule, $pesan);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status_code' => 422, //422 | server meresponse tapi validasi tidak lolos
    //             'errors' => $validator->errors(),
    //         ]);
    //     }

    //     $google2fa = app('pragmarx.google2fa');
        
    //     $sesi = session([
    //         'request_data'     => $request->all(),
    //         'goggle2fa_secret' => $google2fa->generateSecretKey(),
    //     ]);

    //     session()->flash('request_registrasi', $sesi);

    //     $responseData = [
    //         'status_code' => 200,
    //         'message' => 'Selangkah lagi untuk Daftar akun',
    //     ];
        
    //     return response()->json($responseData, 200);
        
    //     // Logic for successful validation
    //     // session()->flash('keyword', 'TambahData');
    //     // session()->flash('pesan', 'Berhasil Daftar akun');
    //     // return redirect('/auth-sign-in');
    // }

    public function setGoogle2fa(){
        $request = session('request_data');
        $secret = session('goggle2fa_secret');

        if(!$request){
            return redirect(URL()->previous());
        }

        $google2fa = app('pragmarx.google2fa');

        $QR_Image = $google2fa->getQRCodeInline(
            config('app.name'),
            $request['email'],
            session('goggle2fa_secret')
        );
        
        return view('module/web/setkeamanan', [
            'QR_Image' => $QR_Image,
            'secret' => $secret,
            'request' => $request
        ]);
    }

    public function selesaikanpendaftaran(){
        $request = session('request_data');
        $secret  = session('goggle2fa_secret');

        if(!$request){
            return redirect(URL()->previous());
        }

        $store = New User();
        $store->id = Uuid::uuid4()->toString();
        $store->status_user = 'visitor';
        $store->nip = null;
        $store->name = $request['name'];
        $store->username = $request['email'];
        $store->password = bcrypt($request['password']);
        $store->email = $request['email'];
        $store->phone = $request['phone'];
        $store->institusi_asal = $request['institusi_asal'];
        $store->jk = $request['jk'];
        $store->g2fa = $secret;
        $store->save();
        // $store->refresh();

        // masukkan ke assign role visitor
        $role = 'visitor';
        $user = \App\User::find($store->id);
        $user->assignRole($role);

        // Logic for successful validation
        session()->flash('keyword', 'TambahData');
        session()->flash('pesan', 'Berhasil Daftar akun');
        return redirect('/');
    }

    public function regeneratepassword(){
        return view('module/web/otp_password');
    }

    public function cekregeneratepassword(Request $request){
        $rule = [
            'password' => ['required', 'string'],
        ];

        $pesan = [
            'password.required' => 'Kolom password harus diisi.',
            'password.min' => 'Panjang password minimal :min karakter.',
        ];

        $validator = Validator::make($request->all(), $rule, $pesan);

        if ($validator->fails()) {
            return redirect('regenerate-qrcode-password')->withErrors($validator)->withInput($request->all());
        }

        $user = Auth::user();

        if(!$user){
            session()->flash('keyword', 'Alert');
            session()->flash('pesan', 'Ada yang salah, silahkan coba kembali');
            return redirect('/');
        }
        
        if(Hash::check($request->password, $user->password)){
            session(['password_check' => 'true']);
            return redirect('regenerate-qrcode-ulang');
        }else{
            session()->flash('keyword', 'Alert');
            session()->flash('pesan', 'Password salah');
            return redirect('/regenerate-qrcode-password');
        }
    }

    public function regenerateulang(){
        $user = Auth::user();

        if(!$user){
            session()->flash('keyword', 'Alert');
            session()->flash('pesan', 'Ada yang salah, silahkan coba kembali');
            return redirect('/');
        }

        $google2fa = app('pragmarx.google2fa');
        $secret = $google2fa->generateSecretKey();

        $QR_Image = $google2fa->getQRCodeInline(config('app.name'), $user->email, $secret);

        return view('module/web/otp_regenerate', [
            'QR_Image' => $QR_Image,
            'secret' => $secret
        ]);
    }

    public function cekgenerateulang(Request $request){
        if(!Auth::user()){
            session()->flash('keyword', 'Alert');
            session()->flash('pesan', 'Ada yang salah, coba kembali');
            return redirect('/');
        }

        $update = User::find(Auth::user()->id);
        $update->g2fa = $request->otps;
        $update->save();

        session()->flash('keyword', 'TambahData');
        session()->flash('pesan', 'Masukkan OTP');
        return redirect('/otp');
    }

}
