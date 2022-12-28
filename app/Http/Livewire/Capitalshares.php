<?php

namespace App\Http\Livewire;

use App\Exports\CapitalShareExport;
use App\Models\Account;
use App\Models\Employee;
use App\Models\Setting;
use App\Models\Tempcapitalshare;
use App\Models\Transaction;
use Livewire\Component;
use Illuminate\Support\Str;
use Auth;
use Maatwebsite\Excel\Facades\Excel;

class Capitalshares extends Component
{
   
    public function render()
    {
        return view('livewire.capitalshares.index',['employees'=>Employee::where('ispinecoopmem',1)->get()]);
    }

    public function export() 
    {
        return Excel::download(new CapitalShareExport, 'capitalshares.xlsx');
    }

}
