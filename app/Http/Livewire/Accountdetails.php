<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\Transaction;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Accountdetails extends Component
{

    public $account_id, $account, $openDepositForm = false, $transactiontype, $computationtype, $amount;
    
    public function mount(){
        $this->account = Account::find($this->account_id);
    }

    public function render()
    {
        $this->account = Account::find($this->account_id);
        return view('livewire.accountdetails');
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

        $transaction = new Transaction;

        $transaction->transaction_reference_number = "2022-TJOUWERWER-009";
        $transaction->amount = ($this->amount * $this->computationtype);
        $transaction->dateoftransaction = date('y-m-d');
        $transaction->account_id = $this->account_id;
        $transaction->user_id = Auth::user()->id;
        $transaction->save();

        session()->flash('message', 'Transaction posted.');

        $this->amount = '';
        $this->openDepositForm = false;
    }
}
