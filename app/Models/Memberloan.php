<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memberloan extends Model
{
    use HasFactory;
    protected $dates = ['date_applied','date_approved'];
    protected $fillable = [
        'member_id',
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

    public function member(){
        return $this->belongsTo(Employee::class, 'member_id', 'id');
    }
}
