<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;

class Memberdetails extends Component
{

    public $member_id,$employee; 

    public function mount(){
        $this->employee = Employee::find($this->member_id);
    }
    public function render()
    {
        return view('livewire.memberdetails');
    }
}
