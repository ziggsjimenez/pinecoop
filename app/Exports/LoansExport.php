<?php
namespace App\Exports;

use App\Models\Loan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LoansExport implements FromView
{

    private $isMember;

    public function __construct(int $isMember) 
    {
        $this->isMember = $isMember;
    }

    public function view(): View
    {

        if($this->isMember==2){
        return view('exports.loans', [
            'loans' => Loan::all()
        ]);
    }
    else
    {
        return view('exports.loans', [
            'loans' => Loan::join('employees','employees.id','loans.employee_id')->where('employees.ispinecoopmem',$this->isMember)->get()
        ]);

    }


    }
}

