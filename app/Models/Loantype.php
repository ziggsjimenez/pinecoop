<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loantype extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'interest',
        'minpaymentterms',
        'maxpaymentterms',
        'minloanamount',
        'maxloanamount',
        'minlengthofservice',
        'type',
    ];
}
