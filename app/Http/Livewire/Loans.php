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

    public $isMember; 

    public function mount(){
        $this->isMember=2;
    }

    public function render()
    {

        if($this->isMember==2){
            return view('livewire.loans.index',['loans'=>Loan::where('loans.refnum','LIKE','%'.$this->searchToken.'%')->paginate(25)]);
        }

        else{
            return view('livewire.loans.index',['loans'=>Loan::join('employees','employees.id','loans.employee_id')->where('employees.ispinecoopmem',$this->isMember)
            ->where('loans.refnum','LIKE','%'.$this->searchToken.'%')
            ->paginate(25)]);
        }


    }

    public function updateRegular(){

        $this->isMember=1; 

    }

    public function updateAssociate(){

        $this->isMember=0;
    }

    public function updateAll(){
        $this->isMember=2;
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
        switch($this->isMember){
            case 0: $temp="Associate";break;
            case 1: $temp="Regular"; break;
            case 2: $temp="All";break;
        }
        return Excel::download(new LoansExport($this->isMember), $temp.'_loans.xlsx');
    }
}
