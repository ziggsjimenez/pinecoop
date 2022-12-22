<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\Transaction;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Accountdetails extends Component
{

    public $account_id, $account, $openDepositForm = false, $transactiontype, $computationtype, $amount=500,$depositdate;
    
    public function mount(){
        $this->account = Account::find($this->account_id);
    }

    public function render()
    {
        $this->account = Account::find($this->account_id);
        return view('livewire.accountdetails.accountdetails');
    }

    public function showTransactionForm($type)
    {       
        $this->transactiontype = $type;
        if($type == 'Deposit'){
            $this->computationtype = 1;
        }else if($type == 'Withdraw'){
            $this->computationtype = -1;
        }
        $this->openDepositForm = true;
    }

    public function transact()
    {
        $this->validate([
            'amount' => 'required',
        ]);

        if($this->depositdate==null){
            $savedate = date('y-m-d');
        }
        else{
            $savedate = $this->depositdate; 
        }

        $transaction = new Transaction;

        $transaction->transaction_reference_number =  date('Y').'-'.date('mdhis');
        $transaction->amount = ($this->amount * $this->computationtype);
        $transaction->dateoftransaction = $savedate;
        $transaction->account_id = $this->account_id;
        $transaction->user_id = Auth::user()->id;
        $transaction->save();

        session()->flash('message', 'Transaction posted.');

        $this->amount = 500;
        $this->openDepositForm = false;
    }
}
