<?php

namespace App\Http\Livewire;

use App\Exports\MonthlyDeductionsExport;
use App\Models\Paymentschedule;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Monthlydeductions extends Component
{

    public $year, $month, $paymentschedules, $tempyear; 

    public function mount(){
        $this->tempyear = date('Y');
    }

    public function render()
    {
        return view('livewire.loans.monthlydeductions');
    }

    public function show(){

        $this->paymentschedules = Paymentschedule::whereYear('paymentdate','=',$this->year)->whereMonth('paymentdate','=',$this->month)->where('ispaid',0)->where('monthlyamort','<>',0)->get(); 

    }

    public function export() 
    {
        return Excel::download(new MonthlyDeductionsExport($this->year,$this->month), $this->year."_".$this->month."_".'monthlybilling.xlsx');
        
    }


}
