<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();

        // dd(auth()->user()->hasRole('superadmin'));
        // dd(auth()->user()->getRoleNames());

        // $users = \App\User::role('bendahara_penerimaan')->get();
        // dd($users);

        // $user = \App\User::permission('Manage Tindakan')->get();
        // dd($user);

        return view('rolepermission/role/index', [
            'Mrole' => $role
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Role::create([
            'name' => $request->name,
            'web' => $request->guard_name    
        ]);

        session()->flash('keyword', 'TambahData');
        session()->flash('pesan', 'Data Ditambahkan');
        return redirect('/role');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::find($id);

        $role->name = $request->name; 
        $role->guard_name = $request->guard_name; 
        $role->save();
        // $role->update($request->all());

        session()->flash('keyword', 'EditData');
        session()->flash('pesan', 'Data diubah');
        return redirect('/role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete($role);

        session()->flash('keyword', 'HapusData');
        session()->flash('pesan', 'Data Dihapus');
        return redirect('/role');
    }
}
