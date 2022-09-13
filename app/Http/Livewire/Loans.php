<?php

namespace App\Http\Livewire;

use App\Models\Memberloan;
use Livewire\Component;

class Loans extends Component
{

    public $memberloan_id, $loan; 

    public function mount(){
        $this->loan = Memberloan::find($this->memberloan_id);
    }
    public function render()
    {
        return view('livewire.loans');
    }
}
