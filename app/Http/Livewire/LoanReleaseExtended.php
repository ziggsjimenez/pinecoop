<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\Loan;
use App\Models\Loanguarantor;
use App\Models\Processingincome;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class LoanReleaseExtended extends Component
{

    public $loan_id,$loan,$showApproveLoanModal=false, $showGuarantor=false,$regularmembers,$searchToken; 

    public function mount(){
        $this->loan = Loan::find($this->loan_id);

        if($this->loan->status=="Approved"){
            return redirect()->route('loan',['loan_id'=>$this->loan->id]);
        }
    }
    public function render()
    {
        $this->loan = Loan::find($this->loan_id);

            return view('livewire.loanrelease.extended');
        
      
    }

    public function openApproveLoanModal(){

        $this->showApproveLoanModal = true; 
        
    }

    public function approveLoan(){

        Loan::find($this->loan_id)->update(['status'=>"Approved",'netamount'=>$this->loan->netamount()]);

        $processingincome = new Processingincome();
        $processingincome->loan_id = $this->loan->id;
        $processingincome->fee = $this->loan->processingfee();
        $processingincome->insurance = $this->loan->insurance();
        $processingincome->save();


        $this->showApproveLoanModal = false;

        $loan = Loan::find($this->loan->id);

        // $pdf = Pdf::loadView('livewire.loandetails.pdf.loanrelease',['loan'=>$loan] );

        // return $pdf->download($loan->employee->fullname2().'_ps.pdf');


        $pdfContent = PDF::loadView('livewire.loandetails.pdf.loanrelease', ['loan'=>$loan])->output();
return response()->streamDownload(
     fn () => print($pdfContent),
     $loan->refnum."_paymentschedule.pdf"
);



    }


    public function addGuarantor(){
        $this->showGuarantor = true; 
    }

    public function loadRegularMembers(){
        $this->regularmembers = Employee::where('ispinecoopmem',1)->where('lastname','LIKE','%'.$this->searchToken.'%')->get();
    }

    public function saveGuarantor($id){

        $lg = new Loanguarantor; 

        $lg->loan_id = $this->loan->id; 
        $lg->employee_id = $id; 
        $lg->save(); 

        $this->showGuarantor = false; 
        $this->regularmembers = null;

    }

    public function removeGuarantor($id){

        Loanguarantor::find($id)->delete(); 

    }

    
}
