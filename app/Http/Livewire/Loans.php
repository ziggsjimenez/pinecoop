<?php

namespace App\Http\Livewire;

use App\Exports\LoansExport;
use App\Models\Loan;
use App\Models\Memberloan;
use App\Models\Payment;
use App\Models\Paymentschedule;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Loans extends Component
{


    use WithPagination; 

    public $searchToken, $loan_id,$showDeleteConfirmation=false; 

    public function render()
    {
        return view('livewire.loans.index',['loans'=>Loan::where('refnum','LIKE','%'.$this->searchToken.'%')->paginate(25)]);
    }

    public function deleteLoan($id){

        $this->loan_id = $id; 

        $this->showDeleteConfirmation = true; 

    }

    public function delete(){

        Payment::where('loan_id',$this->loan_id)->delete();
        Paymentschedule::where('loan_id',$this->loan_id)->delete();
        Loan::find($this->loan_id)->delete(); 
        $this->showDeleteConfirmation = false;
    }

    public function export() 
    {
        return Excel::download(new LoansExport, 'loans.xlsx');
    }
}
