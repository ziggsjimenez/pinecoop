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

    public $LOANTYPE;
    public $loan_id, $modaleditemployeeloan = false,$userid,$approveConfirmationModal = false;
    public $loan, $loantype_id, $interest, $type, $terminmonths, $amount, $maxloanamount; //Loan forms

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
        return view('livewire.loandetails.loandetails');
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

        $paymentdate = $this->loan->dateapproved;


        for ($x = 0; $x < $this->loan->terminmonths; $x++) {

            $interestamount = $balance * $this->loan->interest;
            $paymentschedule = new Paymentschedule;
            $paymentschedule->loan_id = $this->loan->id;
            $paymentschedule->paymentdate = $paymentdate;
            $paymentschedule->principal = $monthly;
            $paymentschedule->interest = $interestamount;
            $paymentschedule->monthlyamort = $interestamount + $monthly;
            $paymentschedule->balance = $balance;
            $paymentschedule->save();

            date_add($paymentdate, date_interval_create_from_date_string("30 days"));
            $balance -= $monthly;
        }
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
