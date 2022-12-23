<?php

namespace App\Http\Livewire;

use App\Models\Loan;
use App\Models\Payment;
use App\Models\Paymentschedule;
use Livewire\Component;

class Loansummary extends Component
{

    public $loans, $payments,$projectedInterestIncome; 

    public function mount(){
        $this->loans = Loan::all(); 
        $this->payments = Payment::all(); 
        $this->projectedInterestIncome = $this->CalculateProjectedInterestIncome();

        
    }

    private function CalculateProjectedInterestIncome(){

        $ps = Paymentschedule::where('ispaid',0)->get(); 

        return $ps->sum('interest');

    }


    public function render()
    {
        return view('livewire.loans.loansummary');
    }


}
