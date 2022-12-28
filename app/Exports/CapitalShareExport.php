<?php
namespace App\Exports;

use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CapitalShareExport implements FromView
{
    public function view(): View
    {
        return view('exports.capitalshares', [
            'employees' => Employee::where('ispinecoopmem',1)->get()
        ]);
    }
}

