<?php

namespace Database\Seeders;

use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrRole = [
            'superadmin',
            'operator',
            'visitor'
        ];

        DB::beginTransaction();
        
        foreach ($arrRole as $key => $value) {
            Role::create([
                'name' => $value,
                'guard_name' => 'web'
            ]);
        }

        DB::commit();
    }
}
