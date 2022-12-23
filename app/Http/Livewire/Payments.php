<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class Payments extends Component
{

    use WithPagination;

    public $fromdate,$todate; 

    public function mount(){

       

    }
    public function render()
    {
        return view('livewire.loans.payments',['payments'=>Payment::whereBetween('paymentdate',[$this->fromdate,$this->todate])->get()]);
    }
}
