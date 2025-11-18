<?php

namespace Database\Seeders;

use App\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            'Manage All User Plus Role Permission',
            'Visitor - Pengajuan saya',
            'Operator - Antrian Pengajuan Proposal',
            'Operator - Riwayat Proposal',
            'Visitor - Riwayat Pengajuan',
        ];

        DB::beginTransaction();
        
        foreach ($arr as $key => $value) {
            Permission::create([
                'name' => $value,
                'guard_name' => 'web'
            ]);
        }

        DB::commit();
    }
}
