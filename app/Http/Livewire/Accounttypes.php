<?php

namespace App\Http\Livewire;

use App\Models\Accounttype;
use Livewire\Component;

class Accounttypes extends Component

{
    public $accounttypes,$modalaccounttype=false;
    public $accounttypeid,$name;

    public function mount()
    {
        $this->accounttypes = Accounttype::all();
    }

    public function render()
    {
        $this->accounttypes = Accounttype::all();
        return view('livewire.accounttypes');
    }

    public function showModalAccount($type){
        $this->accounttypeid = $type == 'add'? null: $this->accounttypeid;
        $this->modalaccounttype = true;
    }

    public function saveAccountType(){
        $this->validate([
            'name' => 'required',
        ]);

        Accounttype::updateOrCreate(['id' => $this->accounttypeid], [
            'name' => $this->name,
        ]);

        $this->modalaccounttype = false;
        $this->resetInputFields();
    }

    function editAccountType($accountid){
        $account = Accounttype::find($accountid);
        $this->accounttypeid =  $account->id;
        $this->name = $account->name;

        $this->showModalAccount('edit');
    }

    private function resetInputFields(){
        $this->name = '';
    }
}
