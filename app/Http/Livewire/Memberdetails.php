<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;

class Memberdetails extends Component
{

    public $member_id, $employee, $btnSelected;

    public function mount()
    {
        $this->employee = Employee::find($this->member_id);
    }
    public function render()
    {
        return view('livewire.memberdetails');
    }

    public function selectButton($num)
    {


        switch ($num) {
            case 1:
                $this->btnSelected = "Profile";
                break;
            case 2:
                $this->btnSelected = "Accounts";
                break;
            case 3:
                $this->btnSelected = "Loans";
                break;
        }
    }
}
