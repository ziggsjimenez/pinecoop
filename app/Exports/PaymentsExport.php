<?php
namespace App\Exports;

use App\Models\Payment;
use App\Models\Paymentschedule;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PaymentsExport implements FromView

{
    private $from,$to;

    public function __construct(string $from,string $to) 
    {
        $this->from = $from;
        $this->to = $to;
    }
    

    public function view(): View
    {
        return view('exports.paymentsexport', [
            'payments' => Payment::whereBetween('paymentdate',[$this->from,$this->to])->get()
        ]);
    }
}

    