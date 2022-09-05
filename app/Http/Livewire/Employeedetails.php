<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;

class Employeedetails extends Component
{

    public $employee_id,$employee; 

    public function mount(){

        $this->employee = Employee::find($this->employee_id);
    }

    public function render()
    {
        return view('livewire.employeedetails');
    }

    public function store(){

        $this->validate([
            'Lastname'=>'required',
        ]);

        
    }
}
