<?php

namespace App\Imports;

use App\Nonjaminan;
use Maatwebsite\Excel\Concerns\ToModel;

class NonjaminanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Nonjaminan([
            'nama_pasien' => $row[0],
            'no_mr' => $row[1], 
            'penjamin' => $row[2], 
            'tgl_masuk' => $row[3], 
            'tgl_keluar' => $row[4], 
            'piutang' => $row[5], 
            'keterangan' => $row[6],
            'status_penagihan_nonjaminan' => $row[7],
        ]);
    }
}
