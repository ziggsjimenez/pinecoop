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


    public $loan_id,$loan,$modaleditemployeeloan=false,$showTerminateLoanConfirmation=false,$terminationInterest,$totalTerminationAmount, 
            $loantype_id,$interest,$loanamount,$paymentterms,$openPaymentModal=false,$paymentAmount,$paymentschedules;
            
    public $showEditLoanModal=false, $showApproveLoanModal=false; 

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

    public function openEditLoanModal($loan_id){

        $loan = Loan::find($loan_id); 

        $this->interest = $loan->interest;
        $this->loantype_id = $loan->loantype_id;
        $this->amount= $loan->amount;
        $this->terminmonths= $loan->terminmonths;
        $this->loan_id = $loan_id; 
        $this->showEditLoanModal=true; 
    }

    public function editLoan(){

        $this->loan = Loan::find($this->loan_id)->update(['interest'=>$this->interest,'loantype_id'=>$this->loantype_id,'amount'=>$this->amount,'terminmonths'=>$this->terminmonths]);

        $this->generatePaymentSchedule();

        $this->showEditLoanModal=false;


    }

    public function openApproveLoanModal(){

        $this->showApproveLoanModal = true; 
        
    }

    public function approveLoan(){


        Loan::find($this->loan_id)->update(['status'=>"Approved"]);

        $this->showApproveLoanModal = false;


    }

    public function openTerminateLoanConfirmation(){
        $this->loan = Loan::find($this->loan_id);

        $currentday = date('d'); 

        $this->terminationInterest = (($this->loan->latestPaymentSchedule()->balance * $this->loan->loantype->interest)/30)*$currentday; 

        $this->totalTerminationAmount = $this->loan->latestPaymentSchedule()->balance + $this->terminationInterest; 

        $this->showTerminateLoanConfirmation = true; 
    }

    public function terminateLoan(){

        $payment = new Payment; 
        $payment->paymentdate = date('Y-m-d');
        $payment->paymentdue = $this->loan->latestPaymentSchedule()->paymentdate; 
        $payment->paymentschedule_id = $this->loan->latestPaymentSchedule()->id; 
        $payment->amount = $this->totalTerminationAmount;
        $payment->principal = $this->loan->latestPaymentSchedule()->balance;
        $payment->interest = $this->terminationInterest;
        $payment->loan_id = $this->loan->id;
        $payment->tags = "Php ".$this->totalTerminationAmount ." - Termination";
        $payment->save();

        Loan::find($this->loan->id)->update(['status'=>"Closed"]);

        $ps = Paymentschedule::find($this->loan->latestPaymentSchedule()->id); 
        $ps->principal = $ps->balance; 
        $ps->interest =$this->terminationInterest; 
        $ps->monthlyamort = $this->totalTerminationAmount; 
        $ps->ispaid = 1;
        $ps->save(); 
        
        Paymentschedule::where('loan_id','=',$this->loan->id)->where('ispaid','=',0)->update(['monthlyamort'=>0,'balance'=>0,'principal'=>0,'interest'=>0,'ispaid'=>1]);

        $this->showTerminateLoanConfirmation = false; 

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
            $runningbalance = $excess;
            $currentid = $this->loan->latestPaymentSchedule()->id;

            $payment = new Payment; 
            $payment->paymentdate = date('Y-m-d');
            $payment->paymentdue = $this->loan->latestPaymentSchedule()->paymentdate; 
            $payment->paymentschedule_id = $this->loan->latestPaymentSchedule()->id; 
            $payment->amount = $this->paymentAmount;
            $payment->principal = $this->loan->latestPaymentSchedule()->principal;;
            $payment->interest = $this->loan->latestPaymentSchedule()->interest;
            $payment->loan_id= $this->loan->id;
            Paymentschedule::find($this->loan->latestPaymentSchedule()->id)->update(['ispaid'=>1]);

            $currentid++;

            while($runningbalance>0){
                $ps = Paymentschedule::find($currentid);
                $diff = $runningbalance - $ps->principal; 
                $dummyprincipal = $ps->principal; 
                $fortags = $ps->principal; 
                if($runningbalance>$ps->principal)
                {
                    $ps->balance = $ps->balance - $ps->principal; 
                    $ps->principal = 0 ; 
                }
                else 
                {
                    $ps->balance = $ps->balance - $runningbalance ; 
                    $ps->principal = $ps->dummyprincipal - $diff; 
                    $fortags =  $runningbalance;
                    // $dummyprincipal = $diff;
                }
                $ps->interest = $ps->balance * $ps->loan->loantype->interest; 
                $ps->monthlyamort = $ps->principal + $ps->interest; 
                $payment->tags = $payment->tags. "Amount - ".$fortags." ".$ps->paymentdate."<br>";
                $ps->save(); 
                $runningbalance = $runningbalance - $dummyprincipal;
                $currentid++;
            }
            $payment->save();
        }
    }

    public function generatePaymentSchedule()
    {

        $this->loan = Loan::find($this->loan_id);

        // $this->resetPaymentSchedule($this->loan_id);

        Paymentschedule::where('loan_id', $this->loan_id)->delete();

        $monthly = $this->loan->amount / $this->loan->terminmonths;
        $balance = $this->loan->amount;
        // date for end of the month
        $paymentdate2=date('Y-m-t', strtotime($this->loan->dateapproved));
        // date for adding 30 days
        $paymentdate=date('Y-m-d', strtotime($this->loan->dateapproved));
        $endofdayapproved = date('t', strtotime($this->loan->dateapproved));
        $dayapproved = date('d', strtotime($this->loan->dateapproved));

        $diff= intval($endofdayapproved)-intval($dayapproved);

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
        
          
    }

}