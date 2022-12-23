<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processingincome extends Model
{
    use HasFactory;

    public function loan(){
        return $this->belongsTo('App\Modles\Processingincome'); 
    }
}
