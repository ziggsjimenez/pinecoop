<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;


    protected $fillable = ['lastname',
                            'firstname',
                            'middlename',
                            'extension',
                            'birthdate',
                            'civilstatus',
                            'sex',
                            'religion',
                            'department',
                            'position',
                            'employmentdate',
                            'phonenumber',
                            'educationalattainment',
                            'estimatedannualgross',
                            'tin',
                            'prahouseno',
                            'prabuildingstreet',
                            'prasubdivision',
                            'prabarangay',
                            'pramun',
                            'praprov',
                            'prazipcode',
                            'peahouseno',
                            'peabuildingstreet',
                            'peasubdivision',
                            'peabarangay',
                            'peamun',
                            'peaprov',
                            'peazipcode',
                            'pmailadd',
                            'email',
                            'fbaccount',
                            'ispinecoopmem',
                            'dateofmembership',
                            'pwdid',
                            'ispersonwithdisability',
                            'chapanumber',
                            ];

    public function fullname(){

       return  $this->lastname.", ".$this->firstname." ".$this->middlename." ".$this->extension;

    }


}
