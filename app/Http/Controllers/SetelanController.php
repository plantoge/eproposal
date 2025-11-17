<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SetelanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('setelan/any');
        // if(Auth::user()->roles->contains('name', 'superadmin')){
        //     return view('setelan/index');
        // }else{
        //     return view('setelan/any');
        // }

    }

    public function updateemail(Request $request)
    {
        // dd($request->only('password'));
        if (Hash::check($request->konfirmasipassword, Auth::user()->password)) {
            $user = User::findorfail(Auth::user()->id);
            $user->email = $request->email;
            $user->save();
        }else{
            session()->flash('keyword', 'Alert');
            session()->flash('pesan', 'Password salah!');
            return redirect('setelan');
        }

        session()->flash('keyword', 'EditData');
        session()->flash('pesan', 'Data diubah');
        return redirect('/setelan');
    }

    public function updatepassword(Request $request)
    {
        if (Hash::check($request->passwordsekarang, Auth::user()->password)) {
            // tag name kolom input password baru dengan konfirmasi password baru harus sama nama tag name nya
            // dimana kolom input konfirmasi password baru harus di tambahkan "_confirmation" di tag name nya
            // tag name : password maka tag name konfirmasi password baru harus password_confirmation
            
            $request->validate([
                'passwordbaru' => 'required|min:8|confirmed'
            ]);

            $update = Auth::user()->update(['password' => Hash::make($request->passwordbaru)]);
        }else{
            session()->flash('keyword', 'Alert');
            session()->flash('pesan', 'Password salah!');
            return redirect('setelan');
        }

        session()->flash('keyword', 'TambahData');
        session()->flash('pesan', 'Berhasil ganti Password');
        return redirect('setelan');
    }

    public function updatebiodata(Request $request){
        if (Hash::check($request->konfirmasipassword, Auth::user()->password)) {
            $update = User::findorfail(Auth::user()->id);
            $update->name = $request->nama;
            $update->phone = $request->phone;
            $update->jk = $request->jk;
            $update->institusi_asal = $request->institusi_asal;
            $update->kategori_pendidikan = $request->kategori_pendidikan;
            $update->save();
        }else{
            session()->flash('keyword', 'Alert');
            session()->flash('pesan', 'Password salah');
            return redirect('setelan');
        }

        session()->flash('keyword', 'EditData');
        session()->flash('pesan', 'Data diubah');
        return redirect('/setelan');
    }

    public function updatesecurity(Request $request){
        $update = User::findorfail(Auth::user()->id);
        $update->g2fa_active = $request->g2fa_active;
        $update->save();

        if($update->g2fa == null){
            return redirect('regenerate-qrcode-password');
        }

        session()->flash('keyword', 'EditData');
        session()->flash('pesan', 'Data diubah');
        return redirect('/setelan');
    }
}
