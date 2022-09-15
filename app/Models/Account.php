<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $dates = ['date_opened'];
    protected $fillable = [
        'accounttype_id',
        'employee_id',
        'date_opened',
    ];


    public function accounttype()
    {
        return $this->belongsTo(Accounttype::class, 'accounttype_id', 'id');
    }


    
    public function type()
    {
        return $this->belongsTo(Accounttype::class, 'accounttype_id', 'id');
    }

    public function employee(){
        return $this->belongsTo('App\Models\Employee');
    }

    public function transactions(){
        return $this->hasMany('App\Models\Transaction');
    }

    public function balance(){
        return $this->transactions->sum('amount');
    }
}
