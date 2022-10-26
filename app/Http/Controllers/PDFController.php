<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    
    public function printPaymentSchedule($loan_id){

        $loan = Loan::find($loan_id);

        $pdf = Pdf::loadView('pdf.printPaymentSchedule',['loan'=>$loan] );

        return $pdf->download('invoice.pdf');

        // return view ('pdf.printSOA',['loan'=>$loan] );

    }
}
