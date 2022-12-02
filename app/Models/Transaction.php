<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_reference_number','amount','dateoftransaction','account_id','user_id'];

    protected $dates = ['dateoftransaction'];


    public function account(){
        return $this->belongsTo('App\Model\Account');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
