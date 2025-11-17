<?php

namespace App\Exports;

use App\Nonjaminan;
use Maatwebsite\Excel\Concerns\FromCollection;

class NonjaminanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Nonjaminan::all();
        return Nonjaminan::all();
    }
}
