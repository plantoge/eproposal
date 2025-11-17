<?php

namespace App\Exports;

use App\Tindakan;
use Maatwebsite\Excel\Concerns\FromCollection;

class TindakanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tindakan::all();
    }
}
