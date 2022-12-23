<?php

namespace App\Http\Livewire;

use App\Models\Loan;
use App\Models\Processingincome;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class Loanrelease extends Component
{
    public $loan_id,$loan,$showApproveLoanModal=false; 

    public function mount(){
        $this->loan = Loan::find($this->loan_id);
    }
    public function render()
    {
        return view('livewire.loandetails.loanrelease');
    }

    public function openApproveLoanModal(){

        $this->showApproveLoanModal = true; 
        
    }

    public function approveLoan(){

        Loan::find($this->loan_id)->update(['status'=>"Approved",'netamount'=>$this->loan->netamount()]);

        $processingincome = new Processingincome;
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

}   
