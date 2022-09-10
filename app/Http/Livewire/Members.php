<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;

class Members extends Component
{
    
    public $searchToken; 
    
    public function render()
    {
        return view('livewire.members',['members'=>Employee::where('ispinecoopmem',1)->where('lastname', 'LIKE', '%' . $this->searchToken . '%')->orWhere('firstname', 'LIKE', '%' . $this->searchToken . '%')->orderBy('lastname','ASC')->get()]);
    }
}
