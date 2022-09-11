<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\Transaction;
use Livewire\Component;
use Auth;

class Accountdetails extends Component
{

    public $account_id,$account,$openDepositForm=false,$amount;

    public function mount(){
        $this->account = Account::find($this->account_id);
    }

    public function render()
    {
       
        return view('livewire.accountdetails');
    }

    public function showDepositForm(){
        $this->openDepositForm = true;
    }

    public function closeDepositForm(){
        $this->openDepositForm = false;
    }

    public function resetInputFields(){
        $this->amount = '';
    }

    public function deposit(){

        $this->validate([
            'amount'=>'required',
        ]);

        $transaction = new Transaction;
        
        $transaction->transaction_reference_number = "2022-TJOUWERWER-009";
        $transaction->amount = $this->amount;
        $transaction->dateoftransaction = date('y-m-d');
        $transaction->account_id = $this->account_id;
        $transaction->user_id = Auth::user()->id;
        $transaction->save();
        
        session()->flash('message','Transaction posted.');
        $this->resetInputFields();
        $this->closeDepositForm();
    }
}
