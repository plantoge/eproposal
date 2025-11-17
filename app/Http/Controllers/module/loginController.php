<?php

namespace App\Http\Controllers\module;

use app\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Mail\LupaPasswordMail;
use App\User;
use App\users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use PragmaRX\Google2FA\Google2FA;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class loginController extends Controller
{
    public function passfauzi($data){
        dd(bcrypt($data));
    }
    public function index()
    {
        if(Auth::check() == true){
            if(Auth::user()->hasrole('visitor') == true ){
                return redirect('pengajuan-proposal');
            }else{
                return redirect('panel');
            }
        }

        return view('module/web/home', [
        ]);
    }

    public function verifikasilogin(Request $request)
    {
        $rule = [
            // 'email' => ['required', 'unique:users'],
            'email' => ['required', 'exists:users,email'],
            'password' => ['required'],
        ];

        $pesan = [
            'email.required' => 'Email wajib diisi.',
            'email.exists' => 'Email tidak terdaftar.',
            'password.required' => 'Password wajib diisi.',
        ];

        $validator = Validator::make($request->all(), $rule, $pesan);

        if ($validator->fails()) {
            // return redirect()->route('create-event')->withErrors($validator)->withInput($request->all());

            return response()->json([
                'status_code' => 422, //422 | server meresponse tapi validasi tidak lolos
                'errors' => $validator->errors(),
            ]);
        }

        if(Auth::attempt($request->only('email','password'))){
            if(Auth::user()->hasrole('visitor') == true ){
                $url = 'pengajuan-proposal';
            }else{
                $url = 'panel';
            }

            $responseData = [
                'status_code' => 200,
                'message' => 'Redirect..',
                'url' => $url
            ];
            
            return response()->json($responseData, 200);
        }else{
            // session()->flash('keyword', 'Alert');
            // session()->flash('pesan', 'Email atau Password salah!');
            // return redirect('/login-ulang');

            $responseData = [
                'status_code' => 404,
                'message' => 'Email atau Password salah!',
                'additionalData' => 'Nilai tambahan jika diperlukan.'
            ];
            
            return response()->json($responseData, 200);
        }
    }

    public function otp(){
        if(!Auth::user()){
            return redirect(URL()->previous());
        }

        return view('module/web/otp');
    }

    public function verifikasiotp(Request $request){        
        $google2fa   = New Google2FA();
        $cek = $google2fa->verifyKey(Auth::user()->g2fa, $request->otp);

        if($cek == true){
            session(['g2fa_otp' => 'true']);
            return redirect('/panel');
        }else{
            session()->flash('keyword', 'Error');
            session()->flash('pesan', 'OTP tidak valid');
            return redirect()->route('otp');
        }
    }

    public function checksignin(){
        echo json_encode(auth()->check());
    }

    public function signout()
    {
        Auth::logout(); 
        session()->flush();
        return redirect('/');
    }

    public function resetpass(){
        return view('layout/website/auth/masterReset');
    }

    public function informasi(){
        return view('module/web/informasi');
    }

    public function tutupotp(){
        Auth::logout(); 
        session()->flush();
        return redirect('/');
    }

    // Lupa Password------------------------------------------------------------------------------------------
    public function formlupapassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if(!$user){
            return ResponseFormatter::success([
                'data' => null
            ], 'Email tidak ditemukan');
        }

        $user->forgot_password_token = Str::upper(Str::random(16));
        $user->forgot_password_at = date('Y-m-d H:i:s');
        $user->save();

        $subject = 'Permintaan Pengaturan Ulang Kata Sandi';
        $details = [
            'title' => 'Atur Ulang Kata Sandi',
            'name' => $user->name,
            'email' => $user->email,
            'actionUrl' => url('/redirect-reset-password/'. encrypt($user->forgot_password_token)),
        ];
        
        try {
            $cek = Mail::to($request->email)->send(new LupaPasswordMail($details, $subject));

            return ResponseFormatter::success([
                'data' => null
            ], 'Email konfirmasi berhasil di kirim, silahkan cek di Email Utama / Spam Email');
            

        } catch (Exception $e) {
            dd($e);
            return ResponseFormatter::success([
                'data' => null
            ], 'Email konfirmasi gagal di kirim');

        }
    }

    public function redirectresetpassword($token)
    {
        $token_decrypt = decrypt($token);
        $this->securityToken($token_decrypt);

        return redirect('/reset-password/'.$token);
    }

    public function resetpassword($token)
    {
        $token_decrypt = decrypt($token);
        $nilai = $this->securityToken($token_decrypt);

        if($nilai == 1){
            return redirect('/')
                ->with('danger', 'Expired tidak valid, silahkan request ulang kembali');
        }elseif($nilai == 2){
            return redirect('/')
            ->with('danger', 'Token Expired, silahkan request ulang kembali');
        }

        return view('setelan/LupaPassword', [
            'token' => $token_decrypt
        ]);
    }

    public function storeresetpassword(Request $request)
    {
        $rule = [
            'password' => ['required', 'min:8'],
            'confirmpassword' => ['required', 'same:password'],
        ];

        $pesan = [
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password Minimal 8 karakter.',
            'confirmpassword.required' => 'Confirm Password wajib diisi.',
            'confirmpassword.same' => 'Confirm Password harus sama dengan Password.',
        ];

        $validator = Validator::make($request->all(), $rule, $pesan);

        if ($validator->fails()) {
            // return redirect()->route('create-event')->withErrors($validator)->withInput($request->all());

            return ResponseFormatter::error([
                'error' => $validator->errors()
            ], 'Kesalahan Validasi', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        
        $user = User::where('forgot_password_token', $request->token)->first();

        if($user == null){
            return ResponseFormatter::error([
                'data' => null
            ], 'Token Expired, silahkan request ulang kembali');
        }
        $user->password = bcrypt($request->password);
        $user->forgot_password_token = null;
        $user->forgot_password_at = null;
        $user->save();  

        return ResponseFormatter::success([
            'data' => null
        ], 'Password Berhasil, silahkan login kembali');

    }

        public function securityToken($token)
        {
            $bol = '';
            $user = User::where('forgot_password_token', $token)->first();

            if($user == null){
                return $bol = 1;
                // return redirect('/')
                //     ->with('danger', 'Expired tidak valid, silahkan request ulang kembali');
            }

            $time          = Carbon::createFromFormat('Y-m-d H:i:s', $user->forgot_password_at);
            $now           = Carbon::now();
            $minutesPassed = $now->diffInMinutes($time);

            if ($minutesPassed > 5) {
                $user->forgot_password_token = null;
                $user->forgot_password_at = null;
                $user->save();

                return $bol = 2;
                // return redirect('/')
                // ->with('danger', 'Token Expired, silahkan request ulang kembali');
            }
        }
    // lupa password------------------------------------------------------------------------------------------------------------
}
