<?php

namespace App\Http\Livewire;

use App\Models\Loan;
use App\Models\Payment;
use Livewire\Component;

class Loansummary extends Component
{

    public $loans, $payments; 

    public function mount(){
        $this->loans = Loan::all(); 
        $this->payments = Payment::all(); 
    }
    public function render()
    {
        return view('livewire.loans.loansummary');
    }
}
