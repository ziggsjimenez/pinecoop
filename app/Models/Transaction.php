<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $dates = ['dateoftransaction'];


    public function account(){
        return $this->belongsTo('App\Model\Account');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
