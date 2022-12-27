<?php

namespace App\Http\Livewire;

use App\Models\Loan;
use App\Models\Payment;
use App\Models\Paymentschedule;
use App\Models\Processingincome;
use Livewire\Component;

class Loansummary extends Component
{

    public $fromdate,$todate,$loans, $payments,$projectedInterestIncome,$interestCollect,$collectibles,$processingincome; 

    public function mount(){

        $this->fromdate = '2014-01-01'; 
        $this->todate = date('Y-m-d');
        $this->loans = $this->getLoans();
        $this->payments = $this->getPayments(); 
        $this->projectedInterestIncome = $this->CalculateProjectedInterestIncome();
        $this->collectibles = $this->getCollectibles(); 
        $this->processingincome = $this->getProcessingIncome(); 
    }

    private function getProcessingIncome(){
        return Processingincome::whereBetween('created_at',[$this->fromdate,$this->todate])->get();
    }

    private function getLoans(){

        return Loan::whereBetween('dateapproved',[$this->fromdate,$this->todate])->get();

    }

    private function getPayments(){

        return Payment::whereBetween('paymentdate',[$this->fromdate,$this->todate])->get();
        // return Payment::all(); 
    }

    private function CalculateProjectedInterestIncome(){

        $ps = Paymentschedule::whereBetween('paymentdate',[$this->fromdate,$this->todate])->where('ispaid',0)->get(); 

        return $ps->sum('interest');

    }

    private function getCollectibles(){
        return Paymentschedule::whereBetween('paymentdate',[$this->fromdate,$this->todate])->where('ispaid',0)->get();
    }


    public function render()
    {
        $this->loans = $this->getLoans();
        $this->payments = $this->getPayments(); 
        $this->projectedInterestIncome = $this->CalculateProjectedInterestIncome();
        $this->collectibles = $this->getCollectibles(); 
        $this->processingincome = $this->getProcessingIncome(); 
        return view('livewire.loans.loansummary');
    }


}
