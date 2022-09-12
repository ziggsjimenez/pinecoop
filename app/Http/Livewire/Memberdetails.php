<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\Accounttype;
use App\Models\Employee;
use App\Models\Loantype;
use App\Models\Memberloan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination\WithPagination;

class Memberdetails extends Component
{
    public $member_id, $btnSelected = 'Profile',  $modalmemberaccount = false, $modalmemberloan = false;
    public $EMPLOYEE, $ACCOUNT, $ACCOUNTTYPE, $MEMBERLOAN, $LOANTYPE, $userid; //models
    public $accounttype_id; //Account forms
    public $memberloanid,$loantype_id, $interest, $interesttype, $paymentterms, $loan_amount; //Loan forms

    public function mount()
    {
        $this->LOANTYPE = Loantype::all();
        $this->userid = Auth::id();
    }

    public function render()
    {
        $this->EMPLOYEE = Employee::find($this->member_id);
        $this->ACCOUNT = Account::where('member_id', $this->member_id)->get();
        $this->ACCOUNTTYPE = Accounttype::whereNotIn('id', DB::table('accounts')->select('accounttype_id')->where('member_id', $this->member_id))->get();
        return view('livewire.memberdetails');
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
            'member_id' => $this->member_id,
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
            'loan_amount' => 'required',
        ]);

        Memberloan::updateOrCreate(['id' => $this->memberloanid], [
            'member_id' => $this->member_id,
            'loantype_id' => $this->loantype_id,
            'loan_amount' => $this->loan_amount,
            'interest' => $this->interest,
            'no_of_terms' => $this->paymentterms,
            'date_applied' => date('Y-m-d h:i:s'),
            'date_approved' => date('Y-m-d h:i:s'),
            'loan_officer' => $this->userid,
            'status' => 'Okay',
        ]);

        $this->modalmemberloan = false;
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->loantype_id = '';
        $this->loan_amount = '';
        $this->interest = '';
        $this->paymentterms = '';
        $this->date_applied = '';
        $this->date_approved = '';
        $this->loan_officer = '';
    }

    public function changeloantype(){
        if($this->loantype_id != ''){
            $selectedloantype = Loantype::find($this->loantype_id);
            $this->interest = $selectedloantype->interest;
            $this->interesttype = $selectedloantype->type;
            $this->paymentterms = $selectedloantype->paymentterms;
        }else{
            $this->interest = '';
            $this->interesttype = '';
            $this->paymentterms = '';
        }
    }
}
