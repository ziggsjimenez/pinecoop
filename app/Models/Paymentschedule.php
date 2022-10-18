<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paymentschedule extends Model
{
    use HasFactory;

    protected $dates = ['paymentdate','dateapproved'];

    public function loan(){

        return $this->belongsTo('App\Models\Loan');
    }
}
