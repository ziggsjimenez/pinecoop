<?php

namespace App\Http\Controllers;

use App\Models\Account;

use App\Models\Loan;

use App\Models\Paymentschedule;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    
    public function printPaymentSchedule($loan_id){

        $loan = Loan::find($loan_id);

        $pdf = Pdf::loadView('pdf.printPaymentSchedule',['loan'=>$loan] );

        return $pdf->download($loan->employee->fullname2().'_ps.pdf');

        // return view ('pdf.printSOA',['loan'=>$loan] );

    }

    public function printAccount($account_id){

        $account=Account::find($account_id);

        $pdf = Pdf::loadView('pdf.printAccount',['account'=>$account] );

        return $pdf->download($account->employee->fullname2().'_account.pdf');

        //  return view ('pdf.printAccount',['account'=>$account] );

    }

    public function printPayments($loan_id){

        $arr_paymentsched = array();
        $loan = Loan::find($loan_id);

        // $pdf = Pdf::loadView('pdf.printPaymentSchedule',['loan'=>$loan] );

        // return $pdf->download($loan->employee->fullname2().'_ps.pdf');

        return view ('pdf.printPayments',['loan'=>$loan,'arr_paymentsched'=>$arr_paymentsched] );

    }
}