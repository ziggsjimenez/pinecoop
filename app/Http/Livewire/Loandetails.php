<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\Loan;
use App\Models\Loantype;
use App\Models\Paymentschedule;
use App\Models\AccountType;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

use function Termwind\render;

class Loandetails extends Component
{

    public $LOANTYPE, $EMPLOYEE;
    public $loan_id, $modaleditemployeeloan = false,$userid,$approveConfirmationModal = false, $paidPaymentConfirmationModal = false, $terminateConfirmationModal = false, $cashpaymentmodal = false, $paymentschedule, $arr_paymentsched = array(), $selectedindex;
    public $loan, $loantype_id, $interest, $type, $terminmonths, $amount; //Loan forms
    public $minpaymentterms, $maxpaymentterms, $minloanamount, $maxloanamount, $paymentterms;
    public $paymentAmount;

    public function mount()
    {
        $this->LOANTYPE = Loantype::all();
        $this->userid = Auth::id();
        $this->loan = Loan::find($this->loan_id);
        $this->paymentschedule = Paymentschedule::all();
        $this->LOANTYPE2 = Loantype::find($this->loan->loantype_id);
        $this->EMPLOYEE = Employee::find( $this->loan->employee_id);

        $this->interest = $this->loan->interest;
        $this->type = $this->loan->type;
        $this->terminmonths = $this->loan->terminmonths;
        $this->minpaymentterms = $this->LOANTYPE2->minpaymentterms;
        $this->maxpaymentterms = $this->LOANTYPE2->maxpaymentterms;
        $this->minloanamount = $this->LOANTYPE2->minloanamount;
        $this->maxloanamount = $this->LOANTYPE2->maxloanamount;
        $this->amount = $this->loan->amount;
        $this->loantype_id = $this->loan->loantype_id;
    }


    public function render()
    {
        $this->loan = Loan::find($this->loan_id);

        $this->arr_paymentsched = array();
        $this->loan = Loan::find($this->loan_id);

        return view('livewire.loandetails.index');
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
            $this->selectedloantype = Loantype::find($this->loantype_id);
            $this->interest = $this->selectedloantype->interest;
            $this->minpaymentterms = $this->selectedloantype->minpaymentterms;
            $this->maxpaymentterms = $this->selectedloantype->maxpaymentterms;
            $this->minloanamount = $this->selectedloantype->minloanamount;
            $this->maxloanamount = $this->selectedloantype->maxloanamount;
            $this->terminmonths = $this->selectedloantype->paymentterms;
            $this->type = $this->selectedloantype->type;
        } else {
            $this->interest = '';
            $this->minpaymentterms = '';
            $this->maxpaymentterms = '';
            $this->minloanamount = '';
            $this->maxloanamount = '';
            $this->terminmonths = '';
            $this->type = '';
        }
    }

    public function saveEditEmployeeLoan()
    {
        $this->validate([
            'loantype_id' => 'required',
            'terminmonths' => 'required|numeric|min:'. $this->minpaymentterms.'|max:'.$this->maxpaymentterms,
            'amount' => 'required|numeric|min:'. $this->minloanamount.'|max:'.$this->maxloanamount,
        ]);

        $totalActiveLoanAmmount = $this->EMPLOYEE->loans->where('status', 'Approved')->where("loantype_id",$this->loantype_id)->sum('amount');

     
        
        if($totalActiveLoanAmmount+$this->amount >  $this->maxloanamount){
            session()->flash('message', 'The maximum amount loan for this loan type is <b>Php '.$this->maxloanamount.'</b>. Employee current allowable loan amount is <b>Php'.($this->maxloanamount-$totalActiveLoanAmmount).'</b>');
            session()->flash('message-type', 'danger');
            return;
        }

        $this->loan->loantype_id = $this->loantype_id;
        $this->loan->amount = $this->amount;
        $this->loan->interest = $this->interest;
        $this->loan->terminmonths = $this->terminmonths;
        $this->loan->type =  $this->type;
        $this->loan->loanofficer = $this->userid;
        $this->loan->save();
        $this->modaleditemployeeloan = false;

        // $this->generateSchedule();
    }

    public function showApproveConfirmationModal(){
        $this->approveConfirmationModal = true;
    }

    function approveMemberLoan(){
        $this->loan->status = 'Approved';
        $this->loan->isapproved = true;
        $this->loan->save();
        $this->approveConfirmationModal = false;

        session()->flash('message', 'Member loan approved successfully..');
        $this->render();
    }

    function checkpaymentdata($paymentdate,$principal,$interestamount,$monthlyamort,$actualamount,$balance){
        $temp = Paymentschedule::where([
                    'loan_id' => $this->loan_id,
                    'paymentdate' => $paymentdate,
                    'principal' => $principal,
                    'interest' => $interestamount,
                    'monthlyamort' => $monthlyamort,
                    // 'actualamount' => $actualamount,
                    'balance' => $balance,
            ]);
        return $temp ;
    }

    // FOR TERMINATE ACTION
    function showTerminateConfirmation(){
        $this->terminateConfirmationModal = true;
    }
    // FOR PAID ACTION
    function showPaidPaymentConfirmation($index){
        $this->selectedindex = $index;
        $this->paidPaymentConfirmationModal = true;
    }

    function paidAction(){
        $index = $this->selectedindex;

        $paymentschedule = new Paymentschedule;
        $paymentschedule->loan_id = $this->loan->id;
        $paymentschedule->paymentdate = $this->arr_paymentsched[$index]['paymentdate'];
        $paymentschedule->principal = $this->arr_paymentsched[$index]['principal'];
        $paymentschedule->interest = $this->arr_paymentsched[$index]['interestamount'];
        $paymentschedule->monthlyamort = $this->arr_paymentsched[$index]['monthlyamort'];
        $paymentschedule->actualamount = $this->arr_paymentsched[$index]['monthlyamort'];
        $paymentschedule->balance = $this->arr_paymentsched[$index]['balance'];
        $paymentschedule->save();
        session()->flash('message', '<b>'.date_format(date_create($this->arr_paymentsched[$index]['paymentdate']), 'F d, Y' ).'</b> with monthly amortization of <b>Php '.$this->arr_paymentsched[$index]['monthlyamort'].'</b> has been paid successfully with <b>Paid</b> action.');


        $lastIndex = count($this->arr_paymentsched)-1;
        $chck = $this->checkpaymentdata(
            $this->arr_paymentsched[$lastIndex]['paymentdate'],
            number_format($this->arr_paymentsched[$lastIndex]['principal'], '2','.',''),
            number_format($this->arr_paymentsched[$lastIndex]['interestamount'], '2','.',''),
            number_format($this->arr_paymentsched[$lastIndex]['monthlyamort'], '2','.',''),
            number_format($this->arr_paymentsched[$lastIndex]['actualamount'], '2','.',''),
            number_format($this->arr_paymentsched[$lastIndex]['balance'], '2','.','')
        );
        if($chck->count() > 0){
            $this->loan->status = 'Closed';
            $this->loan->save();
        }
        $this->paidPaymentConfirmationModal = false;
    }



    // FOR CASH PAYMENT ACTION
    function showCashPaymentConfirmation($index){
        $this->paymentAmount = number_format($this->arr_paymentsched[$index]['monthlyamort'], '2', '.', '');
        $this->selectedindex = $index;
        $this->cashpaymentmodal = true;
    }

    function cashPaymentAction(){
        $index = $this->selectedindex;

        $this->validate([
            'paymentAmount' => 'required|numeric|min:'. number_format($this->arr_paymentsched[$index]['monthlyamort'], '2', '.', '').'|max:'. number_format($this->arr_paymentsched[$index]['balance'], '2', '.', ''),
        ]);

        $accounttype = AccountType::where('name',"LIKE", '%capital shares%');
        if($accounttype->count() == 0){
            session()->flash('message', 'No <b>Capital Shares</b> account type has been setup.');
            session()->flash('message-type', 'danger');
            $this->cashpaymentmodal = false;
            return;
        }
       
        $account = DB::table('accounts')
                ->join('accounttypes','accounts.id', '=', 'accounttypes.id')
                ->where('employee_id', $this->loan->employee_id)
                ->where('accounttypes.name', 'LIKE', '%capital shares%');
        if($account->count() == 0){
            session()->flash('message', 'No <b>Capital Shares</b> account has been added to this employee.');
            session()->flash('message-type', 'danger');
            $this->cashpaymentmodal = false;
            return;
        }


        $tempstr = '';
        if($this->paymentAmount > $this->arr_paymentsched[$index]['monthlyamort']){
            $remaining =  $this->paymentAmount - $this->arr_paymentsched[$index]['monthlyamort'];
            $tempstr = '<br>The remaining <b>Php '.number_format($remaining,2,'.',',').'</b> has been automatically deducted the next due date';

            // $transaction = new Transaction();
            // $transaction->transaction_reference_number = '2022-TJOUWERWER-009';
            // $transaction->amount = $remaining;
            // $transaction->dateoftransaction = date('Y-m-d');
            // $transaction->account_id =  $account->first()->id;
            // $transaction->user_id = $this->userid;
            // $transaction->save();
        }   


        $paymentschedule = new Paymentschedule;
        $paymentschedule->loan_id = $this->loan->id;
        $paymentschedule->paymentdate = $this->arr_paymentsched[$index]['paymentdate'];
        $paymentschedule->principal = $this->arr_paymentsched[$index]['principal'];
        $paymentschedule->interest = $this->arr_paymentsched[$index]['interestamount'];
        $paymentschedule->monthlyamort = $this->arr_paymentsched[$index]['monthlyamort'];
        $paymentschedule->balance = $this->arr_paymentsched[$index]['balance'];
        $paymentschedule->actualamount = $this->paymentAmount;
        $paymentschedule->save();


        session()->flash('message', '<b>'.date_format(date_create($this->arr_paymentsched[$index]['paymentdate']), 'F d, Y' ).'</b> with monthly amortization of <b>Php '.$this->arr_paymentsched[$index]['monthlyamort'].'</b> has been paid successfully with total amount of <b>Php '.number_format($this->paymentAmount,2,'.',',').'</b> with <b>Cash Payment</b> action.'. $tempstr);
      
        $this->cashpaymentmodal = false;
    }

    public function terminateLoanAccount(){
        $this->loan->status = 'Terminated';
        $this->loan->save();
        $this->terminateConfirmationModal = false;
    }

    public function hideToast(){
    } 
}
