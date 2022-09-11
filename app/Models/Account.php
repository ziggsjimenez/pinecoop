<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'accounttype_id',
        'member_id',
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

    public function member(){
        return $this->belongsTo(Employee::class,'member_id','id');
    }

    public function transactions(){
        return $this->hasMany('App\Models\Transaction');
    }

    public function balance(){
        return $this->transactions->sum('amount');
    }
}
