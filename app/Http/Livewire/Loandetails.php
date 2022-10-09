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

class Loandetails extends Component
{

    public $LOANTYPE;
    public $loan_id, $modaleditemployeeloan = false,$userid,$approveConfirmationModal = false, $paidPaymentConfirmationModal = false, $cashpaymentmodal = false, $paymentschedule, $arr_paymentsched = array(), $selectedindex;
    public $loan, $loantype_id, $interest, $type, $terminmonths, $amount, $maxloanamount; //Loan forms
    public $selectedRowMonthAmor;

    public function mount()
    {
        $this->loantype_id = $this->loan_id;
        $this->LOANTYPE = Loantype::all();
        $this->userid = Auth::id();
        $this->loan = Loan::find($this->loan_id);
        $this->paymentschedule = Paymentschedule::all();

        $this->interest = $this->loan->interest;
        $this->type = $this->loan->type;
        $this->terminmonths = $this->loan->terminmonths;
        $this->amount = $this->loan->amount;
    }


    public function render()
    {
        $this->arr_paymentsched = array();
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

        session()->flash('message', 'Member loan approved successfully..');
    }

    function checkpaymentdata($paymentdate,$principal,$interestamount,$monthlyamort,$balance){
        array_push($this->arr_paymentsched, [
            'paymentdate' => $paymentdate,
            'principal' =>$principal,
            'interestamount' =>$interestamount,
            'monthlyamort' =>$monthlyamort,
            'balance' =>$balance,
        ]) ;

        $temp = Paymentschedule::where([
                    'loan_id' => $this->loan_id,
                    'paymentdate' => $paymentdate,
                    'principal' => $principal,
                    'interest' => $interestamount,
                    'monthlyamort' => $monthlyamort,
                    'balance' => $balance,
            ])->count();
        return $temp ;
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
        $paymentschedule->balance = $this->arr_paymentsched[$index]['balance'];
        $paymentschedule->save();
        session()->flash('message', '<b>'.date_format(date_create($this->arr_paymentsched[$index]['paymentdate']), 'F d, Y' ).'</b> with monthly amortization of <b>Php '.$this->arr_paymentsched[$index]['monthlyamort'].'</b> has been paid successfully with <b>Paid</b> action.');
        $this->paidPaymentConfirmationModal = false;
    }



    // FOR CASH PAYMENT ACTION
    function showCashPaymentConfirmation($index){
        $this->selectedRowMonthAmor = $this->arr_paymentsched[$index]['monthlyamort'];
        $this->selectedindex = $index;
        $this->cashpaymentmodal = true;
    }

    function cashPaymentAction(){
        $index = $this->selectedindex;

        $this->validate([
            'selectedRowMonthAmor' => 'required|numeric|min:'. $this->arr_paymentsched[$index]['monthlyamort'],
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
    

        $paymentschedule = new Paymentschedule;
        $paymentschedule->loan_id = $this->loan->id;
        $paymentschedule->paymentdate = $this->arr_paymentsched[$index]['paymentdate'];
        $paymentschedule->principal = $this->arr_paymentsched[$index]['principal'];
        $paymentschedule->interest = $this->arr_paymentsched[$index]['interestamount'];
        $paymentschedule->monthlyamort = $this->arr_paymentsched[$index]['monthlyamort'];
        $paymentschedule->balance = $this->arr_paymentsched[$index]['balance'];
        $paymentschedule->save();



        $tempstr = '';
        if($this->selectedRowMonthAmor > $this->arr_paymentsched[$index]['monthlyamort']){
            $remaining =  $this->selectedRowMonthAmor - $this->arr_paymentsched[$index]['monthlyamort'];
            $tempstr = '<br>The remaining <b>Php '.number_format($remaining,2,'.',',').'</b> has been automatically added to <b>Capital Shares.</b>';

            $transaction = new Transaction();
            $transaction->transaction_reference_number = '2022-TJOUWERWER-009';
            $transaction->amount = $remaining;
            $transaction->dateoftransaction = date('Y-m-d');
            $transaction->account_id =  $account->first()->id;
            $transaction->user_id = $this->userid;
            $transaction->save();
        }   

        session()->flash('message', '<b>'.date_format(date_create($this->arr_paymentsched[$index]['paymentdate']), 'F d, Y' ).'</b> with monthly amortization of <b>Php '.$this->arr_paymentsched[$index]['monthlyamort'].'</b> has been paid successfully with total amount of <b>Php '.number_format($this->selectedRowMonthAmor,2,'.',',').'</b> with <b>Cash Payment</b> action.'. $tempstr);
      
        $this->cashpaymentmodal = false;
    }
}
