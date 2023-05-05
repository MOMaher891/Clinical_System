<?php

namespace App\Export;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;

class PatientExport implements FromCollection
{
    public function collection()
    {
        return Patient::all();
    }
}
