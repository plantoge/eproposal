<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class rolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            // [
            //     'name' => Str::random(10),
            //     'email' => Str::random(10).'@gmail.com',
            //     'password' => Hash::make('password'),
            // ],
            [
                'name' => 'superadmin',
                'guard_nam' => 'web'
            ],
            [
                'name' => 'administrator',
                'guard_nam' => 'web'
            ],
            [
                'name' => 'bendahara_penerimaan',
                'guard_nam' => 'web'
            ],
            [
                'name' => 'bendahara_pengeluaran',
                'guard_nam' => 'web'
            ],
            [
                'name' => 'penjamin',
                'guard_nam' => 'web'
            ]
        ]);
    }
}
