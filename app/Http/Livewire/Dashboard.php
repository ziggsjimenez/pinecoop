<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\Loan;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{

    public $birthdays, $month; 

    public function mount(){
        $this->month = date('n');
        $this->birthdays = Employee::select('lastname','firstname','middlename','birthdate',DB::raw('day(birthdate) as day'))->whereMonth('birthdate','=',date('n'))->orderBy('day','ASC')->get();
        $this->loans = Loan::all(); 
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
