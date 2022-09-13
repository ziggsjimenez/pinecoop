<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $dates = ['date_applied','date_approved'];
    protected $fillable = [
        'employee_id',
        'loantype_id',
        'loan_amount',
        'interest',
        'no_of_terms',
        'date_applied',
        'date_approved',
        'loan_officer',
        'status',
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
