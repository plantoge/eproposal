<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class assignroleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \App\User::all();

        return view('rolepermission/assignrole/index', [
            'Musers' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = \App\User::find($id);
        // $role = $user->getRoleNames();
        $role = Role::all();

        return view('rolepermission/assignrole/create', [
            'Mrole' => $role,
            'Muser' => $user,
            'id' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = $request->role;
        $user = \App\User::find($request->id);
        $user->assignRole($role);

        session()->flash('keyword', 'TambahData');
        session()->flash('pesan', 'Data Ditambahkan');
        return redirect('/assignrole');
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
        $user = \App\User::find($id);
        // $role = $user->getRoleNames();
        $role = Role::all();

        return view('rolepermission/assignrole/edit', [
            'Mrole' => $role,
            'Muser' => $user,
            'id' => $id
        ]);
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
        $role = $request->role;
        $user = \App\User::find($id);

        $user->syncRoles([]); //syncroles berarti mengkosongkan role yg berelasi dengan user
        $user->assignRole($role); //baru menginput manual kembali role yg di pilih di form

        session()->flash('keyword', 'EditData');
        session()->flash('pesan', 'Data diubah');
        return redirect('/assignrole');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
