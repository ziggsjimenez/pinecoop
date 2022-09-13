<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\Loan;
use App\Models\Paymentschedule;
use Livewire\Component;

class Loandetails extends Component
{

    public $loan_id; 

    public function mount(){

        $this->loan = Loan::find($this->loan_id);

    
    }


    public function render()
    {

        return view('livewire.loandetails');
    
    }

    public function resetPaymentSchedule(){
        Paymentschedule::where('loan_id',$this->loan->id)->delete();
    }

    public function generateSchedule()
    {

        $this->resetPaymentSchedule();

        $monthly = $this->loan->loan_amount/$this->loan->no_of_terms;  
        $balance = $this->loan->loan_amount;

        $paymentdate = $this->loan->date_approved;


        for ($x = 0; $x < $this->loan->no_of_terms; $x++) {

            $interestamount = $balance*$this->loan->interest;
            $paymentschedule = new Paymentschedule;
            $paymentschedule->loan_id = $this->loan->id;
            $paymentschedule->paymentdate = $paymentdate;
            $paymentschedule->principal = $monthly;
            $paymentschedule->interest = $interestamount;
            $paymentschedule->monthlyamort = $interestamount + $monthly;
            $paymentschedule->balance = $balance;
            $paymentschedule->save();

            date_add($paymentdate,date_interval_create_from_date_string("30 days"));
            $balance -= $monthly; 

          }

    }

}
