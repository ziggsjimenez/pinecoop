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
    public $accounttype_id; //Account forms
    public $memberloanid,$loantype_id, $interest, $interesttype, $paymentterms, $amount,$maxloanamount; //Loan forms

    public $showConfirmChangeStatusModal = false,$type; 

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
    public function showMemberAccountModal($type){
        $this->modalmemberaccount = true;
    }

    public function saveMemberAccount(){
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
        $this->memberloanid = $type == 'add'? null: $this->memberloanid;
        $this->modalmemberloan = true;
    }

    public function saveMemberLoan()
    {
        $this->validate([
            'loantype_id' => 'required',
            'amount' => 'required',
        ]);

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
        $this->interest = '';
        $this->paymentterms = '';
        $this->dateapplied = '';
        $this->dateapproved = '';
        $this->loanofficer = '';
    }

    public function changeloantype(){
        if($this->loantype_id != ''){
            $selectedloantype = Loantype::find($this->loantype_id);
            $this->interest = $selectedloantype->interest;
            $this->interesttype = $selectedloantype->type;
            $this->paymentterms = $selectedloantype->paymentterms;
            $this->maxloanamount = $selectedloantype->maxloanamount;
            $this->type = $selectedloantype->type;
        }else{
            $this->interest = '';
            $this->interesttype = '';
            $this->paymentterms = '';
            $this->maxloanamount = '';
            $this->type = '';
        }
    }


    public function confirmChangeStatus($employee_id){
        $this->showConfirmChangeStatusModal = true; 
        $this->employee_id = $employee_id; 
    }


    public function changeStatus($employee_id){

        $employee = Employee::find($employee_id);


        if(!$employee->hasPendingLoans()){

            if ($employee->status=="Active"){
                $status = "Inactive";
            }
            else 
                $status = "Active";
    
                $employee->status=$status; 
                $employee->save(); 
                $this->showConfirmChangeStatusModal = false; 

        }

        else {
            session()->flash('message', 'Could not set change status: Pending loans detected.');
            session()->flash('message-type', 'danger');
            $this->showConfirmChangeStatusModal = false; 
        }

       
    }


}
