<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\Employee;
use App\Models\Setting;
use App\Models\Tempcapitalshare;
use App\Models\Transaction;
use Livewire\Component;
use Illuminate\Support\Str;
use Auth; 

class Capitalshares extends Component
{
   
    

    public function render()
    {
        return view('livewire.capitalshares.index',['employees'=>Employee::all()]);
    }


}
