<?php

namespace Database\Seeders;

use App\Permission;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        
        $user = New User();
        $user->status_user = 'visitor';
        $user->name = 'superadmin';
        $user->username = 'superadmin@mail.com';
        $user->password = bcrypt('password@32123');
        $user->email = 'superadmin@mail.com';
        $user->phone = null;
        $user->institusi_asal = null;
        $user->jk = null;
        $user->kategori_pendidikan = null;
        $user->save();

        $user->assignRole('superadmin');
        $user->givePermissionTo(Permission::all());

        DB::commit();
    }
}
