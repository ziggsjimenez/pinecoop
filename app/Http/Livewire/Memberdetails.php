<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\Accounttype;
use App\Models\Employee;
use App\Models\Loan;
use App\Models\Loantype;
use App\Models\Memberloan;
use App\Models\Paymentschedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination\WithPagination;
use Illuminate\Support\Str;

class Memberdetails extends Component
{
    public $employee_id, $btnSelected = 'Profile',  $modalmemberaccount = false, $modalmemberloan = false;
    public $EMPLOYEE, $ACCOUNT, $ACCOUNTTYPE, $MEMBERLOAN, $LOANTYPE, $userid; //models
    public $accounttype_id, $selectedloantype; //Account forms
    public $memberloanid, $loantype_id, $interest, $type, $minpaymentterms, $maxpaymentterms, $minloanamount, $maxloanamount, $paymentterms, $amount, $dateapproved; //Loan forms
    public $showConfirmChangeStatusModal = false, $accountxx;

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

        // $articles = DB::table('accounts')
        //     ->select('articles.id as articles_id' )
        //     ->join('categories', 'articles.categories_id', '=', 'categories.id')
        //     ->join('users', 'articles.user_id', '=', 'user.id')
        //     ->where("employee_id", '=', )

        //     ->get();

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

        $count = Loan::all()->count() + 1; 

        $this->validate([
            'loantype_id' => 'required',
            'paymentterms' => 'required|numeric|min:' . $this->minpaymentterms . '|max:' . $this->maxpaymentterms,
            'amount' => 'required|numeric|min:' . $this->minloanamount . '|max:' . $this->maxloanamount,
        ]);

        $totalActiveLoanAmmount = $this->EMPLOYEE->loans->where('status', 'Approved')->where("loantype_id", $this->loantype_id)->sum('amount');

        if ($totalActiveLoanAmmount + $this->amount >  $this->maxloanamount) {
            session()->flash('message', 'The maximum amount loan for this loan type is <b>Php ' . $this->maxloanamount . '</b>. Employee current allowable loan amount is <b>Php' . ($this->maxloanamount - $totalActiveLoanAmmount) . '</b>');
            session()->flash('message-type', 'danger');
            return;
        }

        // Loan::updateOrCreate(['id' => $this->memberloanid], [
        //     'employee_id' => $this->employee_id,
        //     'loantype_id' => $this->loantype_id,
        //     'amount' => $this->amount,
        //     'interest' => $this->interest,
        //     'terminmonths' => $this->paymentterms,
        //     'maxloanamount' => $this->maxloanamount,
        //     'type' => $this->type,
        //     'dateapplied' => date('Y-m-d h:i:s'),
        //     'dateapproved' => $this->dateapproved != ''? $this->dateapproved:date('Y-m-d h:i:s'),
        //     'loanofficer' => $this->userid,
        //     'status' => $this->dateapproved != ''? 'Approved':'Pending',
        //     'isapproved' => $this->dateapproved != ''? 1:0,
        //     'remarks' => $this->dateapproved != ''? 'Old':'New',
        // ]);

        $loan = new Loan; 

        $loan->employee_id = $this->employee_id; 
        $loan->loantype_id = $this->loantype_id;
        $loan->amount = $this->amount;
        $loan->interest = $this->interest;
        $loan->terminmonths = $this->paymentterms;
        $loan->maxloanamount  = $this->maxloanamount;
        $loan->type = $this->type;
        $loan->dateapplied = date('Y-m-d h:i:s');
        $loan->dateapproved = $this->dateapproved != ''? $this->dateapproved:date('Y-m-d');
        $loan->loanofficer = $this->userid;
        $loan->status = "Pending";
        $loan->isapproved = 1;
        $loan->remarks = "New";
        $loan->refnum = date('Ymd').Str::padLeft($count,5,'0');
        $loan->save(); 


        $this->generatePaymentSchedule($loan->id); 

        // $this->modalmemberloan = false;
    //     $this->resetInputFields();
    }

    public function resetPaymentSchedule($loan_id)
    {
        Paymentschedule::where('loan_id', $loan_id)->delete();
    }


    public function generatePaymentSchedule($loan_id)
    {
        $loan = Loan::find($loan_id);
        // $this->resetPaymentSchedule($loan->id);
        $monthly = $loan->amount / $loan->terminmonths;
        $balance = $loan->amount;
        // date for end of the month
        $paymentdate2=date('Y-m-t', strtotime($loan->dateapproved));
        // date for adding 30 days
        $paymentdate=date('Y-m-d', strtotime($loan->dateapproved));
        $endofdayapproved = date('t', strtotime($loan->dateapproved));
        $dayapproved = date('d', strtotime($loan->dateapproved));

        $diff= intval($endofdayapproved)-intval($dayapproved);

        $firstmonthinterest = (($loan->amount*$loan->interest)/30)*$diff;
        for ($x = 0; $x < $loan->terminmonths; $x++) {
            if($x==0){
                $interestamount = $firstmonthinterest;
            }
            else{
                $interestamount = $balance*$loan->interest;
            }
            
            // $interestamount = $balance * $this->loan->interest;
            $paymentschedule = new Paymentschedule;
            $paymentschedule->loan_id = $loan->id;
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
        // dd($employee);
        if (!$employee->hasPendingLoans()) {
            if ($employee->Xxstatus == "Active") {
                $status = "Inactive";
            } else
                $status = "Active";

            $employee->Xxstatus = $status;
            $employee->save();
            $this->showConfirmChangeStatusModal = false;
        } else {
            session()->flash('message', 'Could not set change status: Pending loans detected.');
            session()->flash('message-type', 'danger');
            $this->showConfirmChangeStatusModal = false;
        }
    }

    public function hideToast(){

    }
}
