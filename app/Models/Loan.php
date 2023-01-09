<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Loan extends Model
{
    use HasFactory;
    protected $dates = ['dateapplied','dateapproved'];
    protected $fillable = [
        'employee_id',
        'loantype_id',
        'amount',
        'netamount',
        'interest',
        'terminmonths',
        'maxloanamount',
        'type',
        'dateapplied',
        'dateapproved',
        'loanofficer',
        'status',
        'isapproved',
        'remarks',
    ];

    public function loantype()
    {
        return $this->belongsTo(Loantype::class, 'loantype_id', 'id');
    }

    public function employee(){
        return $this->belongsTo('App\Models\Employee');
    }

    public function paymentschedules(){
        return $this->hasMany('App\Models\Paymentschedule');
    }

    public function aging(){

        if($this->latestPayment()!=null){
            $start = strtotime($this->latestPayment()->paymentdate);
            $end = strtotime(now());
    
            return ceil(abs($end - $start) / 86400);
        }

        else {
            return 0; 
        }
    }

    public function latestMonthlyAmortizaton(){

        $ps = Paymentschedule::where('loan_id',$this->id)->where('ispaid',0)->first();

        if ($ps==null)

        return 0;
        else 

        return $ps->monthlyamort;  

    }

    public function latestPaymentSchedule(){
        return Paymentschedule::where('loan_id',$this->id)->where('ispaid',0)->first();
    }



    public function payments(){
        return $this->hasMany('App\Models\Payment');
    }

    public function latestPayment(){

        return Payment::where('loan_id',$this->id)->orderBy('id','DESC')->first(); 

    }

    public function outstandingBalance(){

        $payskeds = Paymentschedule::where('loan_id',$this->id)->where('ispaid',0)->get();

        if (count($payskeds)==0)
        return 0; 
        else 
        return $payskeds->sum('monthlyamort');
    }

    public function processingfee(){
        return intdiv($this->amount,1000)*2;
    }

    public function insurance(){
        return intdiv($this->amount,1000)*2; 
    }

    public function netamount(){
        return $this->amount-$this->processingfee()-$this->insurance();
    }

    public function guarantors(){
        return $this->hasMany('App\Models\Loanguarantor');
    }


}
