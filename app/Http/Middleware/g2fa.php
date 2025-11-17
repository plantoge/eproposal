<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FA\Google2FA;

class g2fa
{
    public function handle($request, Closure $next)
    {
        if(Auth::user() != true){
            return redirect('/');
        } 

        $google2fa   = New Google2FA();

        if(session('g2fa_otp') == null){
            if(Auth::user()->g2fa_active == null || Auth::user()->g2fa_active == 0){
                return $next($request);
            }else{
                return redirect()->route('otp');
            }
        }else{
            return $next($request);
        }

        // verifikasi otp input sama dengan secret yang tersimpan di user
        // $cek = $google2fa->verifyKey(Auth::user()->g2fa, '267389');

        return $next($request);
    }
}
