<?php

namespace App\Http\Livewire;

use App\Exports\DelinquentsExport;
use App\Models\Loan;
use App\Models\Payment;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Delinquents extends Component
{


    public $loans; 

    public function mount(){
        $this->loans = Loan::all(); 
    }

    public function render()
    {
        return view('livewire.loans.delinquents');
    }

    public function export() 
    {
        return Excel::download(new DelinquentsExport(), 'delinquents.xlsx');
    }
}
