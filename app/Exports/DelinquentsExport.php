<?php
namespace App\Exports;

use App\Models\Loan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DelinquentsExport implements FromView
{
    public function view(): View
    {
        return view('exports.delinquents', [
            'loans' => Loan::all()
        ]);
    }
}

