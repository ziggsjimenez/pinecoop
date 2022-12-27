<?php
namespace App\Exports;


use App\Models\Paymentschedule;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MonthlyDeductionsExport implements FromView

{
    private $year,$month;

    public function __construct(int $year,int $month) 
    {
        $this->year = $year;
        $this->month = $month;
    }
    

    public function view(): View
    {
        return view('exports.monthlydeductions', [
            'paymentschedules' => Paymentschedule::whereYear('paymentdate','=',$this->year)->whereMonth('paymentdate','=',$this->month)->where('ispaid',0)->where('monthlyamort','<>',0)->get()
        ]);
    }
}



    