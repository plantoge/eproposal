<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class givepermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();

        return view('rolepermission.givepermission.index', [
            'Mrole' => $role
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $role = Role::find($id);
        $permission = Permission::orderBy('name', 'asc')->get();

        return view('rolepermission.givepermission.create', [
            'Mrole' => $role,
            'Mpermission' => $permission,
            'id' => $id
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $permission = $request->permission;
        $role = Role::find($id);
        $role->givePermissionTo($permission);

        session()->flash('keyword', 'TambahData');
        session()->flash('pesan', 'Data Ditambahkan');
        return redirect('/givepermission');
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
        $role = Role::find($id);
        // $role = $user->getRoleNames();
        $permission = Permission::orderBy('name', 'asc')->get();

        return view('rolepermission.givepermission.edit', [
            'Mrole' => $role,
            'Mpermission' => $permission,
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
        $permission = $request->permission;
        $role = Role::find($id);

        $role->syncPermissions([]); //syncPermissions berarti mengkosongkan role yg berelasi dengan user
        $role->givePermissionTo($permission); //baru menginput manual kembali role yg di pilih di form

        session()->flash('keyword', 'EditData');
        session()->flash('pesan', 'Data diubah');
        return redirect('/givepermission');
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
