<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\Accounttype;
use App\Models\Employee;
use App\Models\Loan;
use App\Models\Loantype;
use App\Models\Memberloan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination\WithPagination;

class Memberdetails extends Component
{
    public $employee_id, $btnSelected = 'Profile',  $modalmemberaccount = false, $modalmemberloan = false;
    public $EMPLOYEE, $ACCOUNT, $ACCOUNTTYPE, $MEMBERLOAN, $LOANTYPE, $userid; //models
    public $accounttype_id, $selectedloantype; //Account forms
    public $memberloanid, $loantype_id, $interest, $type, $minpaymentterms, $maxpaymentterms, $minloanamount, $maxloanamount, $paymentterms, $amount; //Loan forms
    public $showConfirmChangeStatusModal = false;

    public function mount()
    {
        $this->LOANTYPE = Loantype::all();
        $this->userid = Auth::id();
    }

    public function render()
    {
        $this->EMPLOYEE = Employee::find($this->employee_id);
        $this->ACCOUNT = Account::where('employee_id', $this->employee_id)->get();
        $this->ACCOUNTTYPE = Accounttype::whereNotIn('id', DB::table('accounts')->select('accounttype_id')->where('employee_id', $this->employee_id))->get();
        return view('livewire.memberdetails.memberdetails');
    }

    public function selectButton($btntype)
    {
        $this->btnSelected = $btntype;
    }

    //-------------ACCOUNT TAB---------------
    public function showMemberAccountModal($type)
    {
        $this->modalmemberaccount = true;
    }

    public function saveMemberAccount()
    {
        $this->validate([
            'accounttype_id' => 'required',
        ]);

        Account::create([
            'accounttype_id' => $this->accounttype_id,
            'employee_id' => $this->employee_id,
            'date_opened' => date('Y-m-d'),
        ]);

        $this->modalmemberaccount = false;
        $this->accounttype_id = '';
    }



    //-------------LOAN TAB---------------
    public function showMemberLoanModal($type)
    {
        $this->memberloanid = $type == 'add' ? null : $this->memberloanid;
        $this->modalmemberloan = true;
    }

    public function saveMemberLoan()
    {
        $this->validate([
            'loantype_id' => 'required',
            'paymentterms' => 'required|numeric|min:'. $this->minpaymentterms.'|max:'.$this->maxpaymentterms,
            'amount' => 'required|numeric|min:'. $this->minloanamount.'|max:'.$this->maxloanamount,
        ]);

        $totalActiveLoanAmmount = $this->EMPLOYEE->loans->where('status', 'Approved')->where("loantype_id",$this->loantype_id)->sum('amount');

     
        
        if($totalActiveLoanAmmount+$this->amount >  $this->maxloanamount){
            session()->flash('message', 'The maximum amount loan for this loan type is <b>Php '.$this->maxloanamount.'</b>. Employee current allowable loan amount is <b>Php'.($this->maxloanamount-$totalActiveLoanAmmount).'</b>');
            session()->flash('message-type', 'danger');
            return;
        }

        Loan::updateOrCreate(['id' => $this->memberloanid], [
            'employee_id' => $this->employee_id,
            'loantype_id' => $this->loantype_id,
            'amount' => $this->amount,
            'interest' => $this->interest,
            'terminmonths' => $this->paymentterms,
            'maxloanamount' => $this->maxloanamount,
            'type' => $this->type,
            'dateapplied' => date('Y-m-d h:i:s'),
            'dateapproved' => date('Y-m-d h:i:s'),
            'loanofficer' => $this->userid,
            'status' => 'Pending',
            'isapproved' => false,
        ]);

        $this->modalmemberloan = false;
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->loantype_id = '';
        $this->amount = '';
        $this->paymentterms = '';
        $this->interest = '';
        $this->type = '';
    }

    public function changeloantype()
    {
        if ($this->loantype_id != '') {
            $this->selectedloantype = Loantype::find($this->loantype_id);
            $this->interest = $this->selectedloantype->interest;
            $this->minpaymentterms = $this->selectedloantype->minpaymentterms;
            $this->maxpaymentterms = $this->selectedloantype->maxpaymentterms;
            $this->minloanamount = $this->selectedloantype->minloanamount;
            $this->maxloanamount = $this->selectedloantype->maxloanamount;
            $this->type = $this->selectedloantype->type;
        } else {
            $this->interest = '';
            $this->minpaymentterms = '';
            $this->maxpaymentterms = '';
            $this->minloanamount = '';
            $this->maxloanamount = '';
            $this->type = '';
        }
    }


    public function confirmChangeStatus($employee_id)
    {
        $this->showConfirmChangeStatusModal = true;
        $this->employee_id = $employee_id;
    }


    public function changeStatus($employee_id)
    {
        $employee = Employee::find($employee_id);
        if (!$employee->hasPendingLoans()) {
            if ($employee->status == "Active") {
                $status = "Inactive";
            } else
                $status = "Active";

            $employee->status = $status;
            $employee->save();
            $this->showConfirmChangeStatusModal = false;
        } else {
            session()->flash('message', 'Could not set change status: Pending loans detected.');
            session()->flash('message-type', 'danger');
            $this->showConfirmChangeStatusModal = false;
        }
    }
}
