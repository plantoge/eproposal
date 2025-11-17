<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class permissionController extends Controller
{
    
    public function index()
    {
        $permission = Permission::orderBy('name', 'asc')->get();

        // dd(auth()->user()->hasRole('superadmin'));
        // dd(auth()->user()->getRoleNames());

        // $users = \App\User::role('bendahara_penerimaan')->get();
        // dd($users);

        // $user = \App\User::Permission('Manage Tindakan')->get();
        // dd($user);

        return view('rolepermission/permission/index', [
            'Mpermission' => $permission
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Permission::create([
            'name' => $request->name,
            'web' => $request->guard_name    
        ]);

        session()->flash('keyword', 'TambahData');
        session()->flash('pesan', 'Data Ditambahkan');
        return redirect('/permission');
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
        $permission = Permission::find($id);
        
        $permission->name = $request->name; 
        $permission->guard_name = $request->guard_name; 
        $permission->save();
        // $permission->update($request->all());

        session()->flash('keyword', 'EditData');
        session()->flash('pesan', 'Data diubah');
        return redirect('/permission');
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete($permission);

        session()->flash('keyword', 'HapusData');
        session()->flash('pesan', 'Data Dihapus');
        return redirect('/permission');
    }

}
