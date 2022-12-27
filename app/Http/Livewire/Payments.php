<?php

namespace App\Http\Livewire;

use App\Exports\PaymentsExport;
use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

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

    public function export() 
    {
        return Excel::download(new PaymentsExport($this->fromdate,$this->todate), $this->fromdate."_".$this->todate."_".'payments.xlsx');
        
    }
}
