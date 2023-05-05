<?php

namespace App\Export;

// use App\Models\Patient;

use App\Models\Application;
use Maatwebsite\Excel\Concerns\FromCollection;

class ApplicationExport implements FromCollection
{
    public function collection()
    {
        return Application::with('department','patient')->get();
    }
}
