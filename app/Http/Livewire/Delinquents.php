<?php

namespace App\Http\Livewire;

use App\Models\Loan;
use App\Models\Payment;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

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
}
