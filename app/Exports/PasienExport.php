<?php

namespace App\Exports;

use App\Models\dataPasien;
use Maatwebsite\Excel\Concerns\FromCollection;

class PasienExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return dataPasien::all();
    }
}
