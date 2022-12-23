<?php

namespace App\Http\Livewire;

use App\Models\Paymentschedule;
use Livewire\Component;

class Monthlydeductions extends Component
{

    public $year, $month, $paymentschedules; 

    public function render()
    {
        return view('livewire.loans.monthlydeductions');
    }

    public function show(){

        $this->paymentschedules = Paymentschedule::where('')->get(); 

    }
}
