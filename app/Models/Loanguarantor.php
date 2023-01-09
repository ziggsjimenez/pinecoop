<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loanguarantor extends Model
{
    use HasFactory;

    public function loan(){
        return $this->belongsTo('App\Models\Loan');
    }

    public function employee(){
        return $this->belongsTo('App\Models\Employee');
    }
}
