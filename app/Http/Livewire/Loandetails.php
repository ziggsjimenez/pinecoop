<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\Loan;
use App\Models\Loantype;
use App\Models\Paymentschedule;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Loandetails extends Component
{

    public $loan_id,$showApproveLoanModal=false; 

    

    public function mount()
    {
        $this->loantype_id = $this->loan_id;
        $this->LOANTYPE = Loantype::all();
        $this->userid = Auth::id();
        $this->loan = Loan::find($this->loan_id);

        $this->interest = $this->loan->interest;
        $this->type = $this->loan->type;
        $this->terminmonths = $this->loan->terminmonths;
        $this->amount = $this->loan->amount;
    }


    public function render()
    {
        $this->loan = Loan::find($this->loan_id);

        return view('livewire.loandetails.index');
    
    }

    public function resetPaymentSchedule()
    {
        Paymentschedule::where('loan_id', $this->loan->id)->delete();
    }

    public function generateSchedule()
    {

        $this->resetPaymentSchedule();

        $monthly = $this->loan->amount / $this->loan->terminmonths;
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

    public function openApproveLoanModal(){

        $this->showApproveLoanModal = true; 

    }

    public function approveLoan(){

        $loan = Loan::find($this->loan_id);

        $loan->status = "Approved"; 
        $loan->save(); 
        $this->showApproveLoanModal = false; 

    }




    public function showEditEmployeeLoanModal()
    {
        $this->modaleditemployeeloan = true;
    }

    public function changeloantype()
    {
        if ($this->loantype_id != '') {
            $selectedloantype = Loantype::find($this->loantype_id);
            $this->interest = $selectedloantype->interest;
            $this->type = $selectedloantype->type;
            $this->terminmonths = $selectedloantype->paymentterms;
        } else {
            $this->interest = '';
            $this->type = '';
            $this->terminmonths = '';
        }
    }

    public function saveEditEmployeeLoan()
    {
        $this->validate([
            'loantype_id' => 'required',
            'amount' => 'required',
        ]);

        $this->loan->loantype_id = $this->loantype_id;
        $this->loan->amount = $this->amount;
        $this->loan->interest = $this->interest;
        $this->loan->terminmonths = $this->terminmonths;
        $this->loan->type =  $this->type;
        $this->loan->loanofficer = $this->userid;
        $this->loan->save();
        $this->modaleditemployeeloan = false;

        $this->generateSchedule();
    }

    public function showApproveConfirmationModal(){
        $this->approveConfirmationModal = true;
    }

    function approveMemberLoan(){
        $this->loan->status = 'Approved';
        $this->loan->isapproved = true;
        $this->loan->save();
        $this->approveConfirmationModal = false;

        session()->flash('message', 'Member loan approved successfully.');
    }
}
