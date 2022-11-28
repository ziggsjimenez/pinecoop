<?php

namespace App\Http\Livewire;

use App\Models\Loan;
use App\Models\Memberloan;
use Livewire\Component;
use Livewire\WithPagination;

class Loans extends Component
{


    use WithPagination; 

    public $searchToken; 

    public function render()
    {
        return view('livewire.loans.index',['loans'=>Loan::where('refnum','LIKE','%'.$this->searchToken.'%')->paginate(25)]);
    }
}
