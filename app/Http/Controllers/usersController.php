<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class usersController extends Controller
{
    public function index()
    {
        // $contents = 'Contoh isi file';
        // $randomName   = Str::random(40);
        // if (Storage::disk('sftp')->put('keuangan/'.$randomName.'.txt', $contents)) {
        //     // Koneksi SFTP berhasil
        //     echo "Koneksi SFTP berhasil.";
        // } else {
        //     // Koneksi SFTP gagal
        //     echo "Koneksi SFTP gagal.";
        // }

        // dd('stop');
        
        $users = \App\User::all();
        $userwithrole = \App\User::with('roles')->get();

        return view('rolepermission/users/index', [
            'Musers' => $users,
            'Muserswithrole' => $userwithrole
        ]);
    }

    public function store(Request $request)
    {
        $user = New \App\User;
        $user->name = $request->name; 
        $user->email = $request->email; 
        $user->username = $request->username; 
        $user->password = bcrypt($request->password); 
        // $user->role = 'user'; 
        $user->save(); 

        // $user = \App\Benpen::create($request->all());
        session()->flash('keyword', 'TambahData');
        session()->flash('pesan', 'Data ditambahkan');
        return redirect('/users');
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
        $user = \App\User::find($id);

        $user->name = $request->name; 
        $user->email = $request->email; 
        $user->username = $request->username; 
        $user->password = bcrypt($request->password); 
        $user->save();

        session()->flash('keyword', 'EditData');
        session()->flash('pesan', 'Data diubah');
        return redirect('/users');
    }

    public function destroy($id)
    {
        DB::table('users')->where('id', '=', $id)->delete();
        
        session()->flash('keyword', 'HapusData');
        session()->flash('pesan', 'Data Dihapus');
        return redirect('/users');
    }
}
