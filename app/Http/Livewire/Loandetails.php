<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\Loan;
use App\Models\Loantype;
use App\Models\Paymentschedule;
use App\Models\AccountType;
use App\Models\Account;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

use function Termwind\render;

class Loandetails extends Component
{


    public $loan_id,$loan,$modaleditemployeeloan=false,
            $loantype_id,$interest,$loanamount,$paymentterms,$openPaymentModal=false,$paymentAmount,$paymentschedules; 

    
    public function mount(){

        $this->loan = Loan::find($this->loan_id);
        $this->interest = $this->loan->interest;
        $this->type = $this->loan->type;
        $this->amount= $this->loan->amount;
        $this->terminmonths= $this->loan->terminmonths;
        $this->loantypes = Loantype::all();

    }

    public function render(){

        $this->loan = Loan::find($this->loan_id);
        $this->paymentschedules = $this->loan->paymentschedules;
        if(count($this->loan->paymentschedules)>0)
        $this->paymentAmount = $this->loan->latestMonthlyAmortizaton();

        return view('livewire.loandetails.index');
        
    }


    public function showAddPayment(){

        $this->paymentAmount = $this->loan->latestMonthlyAmortizaton();

        $this->openPaymentModal = true; 

    }

    public function processPayment(){

        $monthlyamort = $this->loan->latestPaymentSchedule()->monthlyamort; 

        if($this->paymentAmount==$monthlyamort){

            $payment = new Payment; 
            $payment->paymentdate = date('Y-m-d');
            $payment->paymentdue = $this->loan->latestPaymentSchedule()->paymentdate; 
            $payment->paymentschedule_id = $this->loan->latestPaymentSchedule()->id; 
            $payment->amount = $this->loan->latestPaymentSchedule()->monthlyamort;
            $payment->principal = $this->loan->latestPaymentSchedule()->principal;
            $payment->interest = $this->loan->latestPaymentSchedule()->interest;
            $payment->loan_id= $this->loan->id;
            $payment->tags = "Exact payment.";
            $payment->save();

            Paymentschedule::find($this->loan->latestPaymentSchedule()->id)->update(['ispaid'=>1]);
        }

        if($this->paymentAmount<$monthlyamort){


            $diff = $this->paymentAmount - $this->loan->latestPaymentSchedule()->interest;

            $sub = $this->loan->latestPaymentSchedule()->principal - $diff; 

            $payment = new Payment; 
            $payment->paymentdate = date('Y-m-d');
            $payment->paymentdue = $this->loan->latestPaymentSchedule()->paymentdate; 
            $payment->paymentschedule_id = $this->loan->latestPaymentSchedule()->id; 
            $payment->amount = $this->paymentAmount;
            $payment->principal = $diff;
            $payment->interest = $this->loan->latestPaymentSchedule()->interest;
            $payment->loan_id = $this->loan->id;
            $payment->tags = "Php ".$sub ." added to principal of succeding month.";
            $payment->save();

            Paymentschedule::find($this->loan->latestPaymentSchedule()->id)->update(['ispaid'=>1]);

            $paymentschedule = Paymentschedule::find($this->loan->latestPaymentSchedule()->id); 
            $paymentschedule->principal = $paymentschedule->principal + $sub; 
            $paymentschedule->balance = $paymentschedule->balance + $sub; 
            $paymentschedule->interest =  $paymentschedule->balance * .03; 
            $paymentschedule->monthlyamort=$paymentschedule->interest+$paymentschedule->principal; 
            $paymentschedule->save(); 

        }

        if($this->paymentAmount>$monthlyamort){



            $excess = $this->paymentAmount - $this->loan->latestPaymentSchedule()->monthlyamort; 


            $payment = new Payment; 
            $payment->paymentdate = date('Y-m-d');
            $payment->paymentdue = $this->loan->latestPaymentSchedule()->paymentdate; 
            $payment->paymentschedule_id = $this->loan->latestPaymentSchedule()->id; 
            $payment->amount = $this->paymentAmount;
            $payment->principal = $this->loan->latestPaymentSchedule()->principal;;
            $payment->interest = $this->loan->latestPaymentSchedule()->interest;
            $payment->loan_id= $this->loan->id;
            $payment->tags = "Php ".$excess." deducted to princial of succeding month.";
            $payment->save();

            Paymentschedule::find($this->loan->latestPaymentSchedule()->id)->update(['ispaid'=>1]);

            $paymentschedule = Paymentschedule::find($this->loan->latestPaymentSchedule()->id); 
            $paymentschedule->principal = $paymentschedule->principal - $excess; 
            $paymentschedule->balance = $paymentschedule->balance - $excess; 
            $paymentschedule->interest =  $paymentschedule->balance * .03; 
            $paymentschedule->monthlyamort=$paymentschedule->interest+$paymentschedule->principal; 
            $paymentschedule->save(); 

        }






    }



    public function resetPaymentSchedule()
    {
        Paymentschedule::where('loan_id', $this->loan->id)->delete();
    }


    public function generatePaymentSchedule()
    {
        $this->resetPaymentSchedule();
        $monthly = $this->loan->amount / $this->loan->terminmonths;
        $balance = $this->loan->amount;
        // date for end of the month
        $paymentdate2=date('Y-m-t', strtotime($this->loan->dateapproved));
        // date for adding 30 days
        $paymentdate=date('Y-m-d', strtotime($this->loan->dateapproved));
        $endofdayapproved = date('t', strtotime($this->loan->dateapproved));
        $dayapproved = date('d', strtotime($this->loan->dateapproved));

        $diff= intval($endofdayapproved)-intval($dayapproved);

        echo $diff;

        $firstmonthinterest = (($this->loan->amount*$this->loan->interest)/30)*$diff;
        for ($x = 0; $x < $this->loan->terminmonths; $x++) {
            if($x==0){
                $interestamount = $firstmonthinterest;
            }
            else{
                $interestamount = $balance*$this->loan->interest;
            }
            
            // $interestamount = $balance * $this->loan->interest;
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
          

          return redirect()->route('loan',['loan_id'=>$this->loan->id]);
          
    }

}