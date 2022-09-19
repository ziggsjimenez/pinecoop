<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\Loan;
use App\Models\Paymentschedule;
use Livewire\Component;

class Loandetails extends Component
{

    public $loan_id,$showApproveLoanModal=false; 

    public function mount(){

        $this->loan = Loan::find($this->loan_id);

    
    }


    public function render()
    {

        $this->loan = Loan::find($this->loan_id);
        return view('livewire.loandetails.index');
    
    }

    public function resetPaymentSchedule(){
        Paymentschedule::where('loan_id',$this->loan->id)->delete();
    }

    public function generateSchedule()
    {

        $this->resetPaymentSchedule();

        $monthly = $this->loan->amount/$this->loan->terminmonths;  
        $balance = $this->loan->amount;


        // date for end of the month
        $paymentdate2=date('Y-m-t', strtotime($this->loan->dateapproved));
        // date for adding 30 days
        $paymentdate=date('Y-m-d', strtotime($this->loan->dateapproved));

        $currentday = date('d');
        $endofmonth = date('t');
        $diff= intval($endofmonth)-intval($currentday);
        $firstmonthinterest = (($this->loan->amount*$this->loan->interest)/30)*$diff;


        for ($x = 0; $x < $this->loan->terminmonths; $x++) {

            if($x==0){
                $interestamount = $firstmonthinterest;
            }
            else{
                $interestamount = $balance*$this->loan->interest;
            }

            
            $paymentschedule = new Paymentschedule;
            $paymentschedule->loan_id = $this->loan->id;

            $paymentschedule->paymentdate = $paymentdate2;
            $paymentschedule->principal = $monthly;
            $paymentschedule->interest = $interestamount;
            $paymentschedule->monthlyamort = $interestamount + $monthly;
            $paymentschedule->balance = $balance;
            $paymentschedule->save();

            // add 30 days to month
            $paymentdate = date("Y-m-d", strtotime ( '+1 month' , strtotime ( $paymentdate ) )) ;
            // get end of the month
            $paymentdate2 = date("Y-m-t", strtotime ($paymentdate )) ;
          
            $balance -= $monthly; 

          }

    }

    public function openApproveLoanModal(){

        $this->showApproveLoanModal = true; 

    }

    public function approveLoan(){

        $loan = Loan::find($this->loan_id);

        $loan->status = "Approved"; 
        $loan->save(); 
        $this->showApproveLoanModal = false; 

    }

}
