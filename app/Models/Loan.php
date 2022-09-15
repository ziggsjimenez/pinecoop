<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $dates = ['dateapplied','dateapproved'];
    protected $fillable = [
        'employee_id',
        'loantype_id',
        'amount',
        'interest',
        'terminmonths',
        'maxloanamount',
        'type',
        'dateapplied',
        'dateapproved',
        'loanofficer',
        'status',
        'isapproved',
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


}
