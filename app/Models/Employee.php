<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

                            protected $dates = ['birthdate'];

    public function fullname(){

        $badge="";


        if($this->isActive())
        $badge = "<span class=\"bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900\">Active</span>";
        else
        $badge = "<span class=\"bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900\">Inactive</span>";
  

    

       return  $this->lastname.", ".$this->firstname." ".$this->middlename." ".$this->extension. "  ".$badge;

    }

    public function praddress(){
        return $this->prahouseno." ".$this->prabuildingstreet." ".$this->prasubdivision." ".$this->prabarangay." ".$this->pramun." ".$this->praprov;
    }

    public function peaddress(){
        return $this->peahouseno." ".$this->peabuildingstreet." ".$this->peasubdivision." ".$this->peabarangay." ".$this->peamun." ".$this->peaprov;       
    }

    public function loans(){
        return $this->hasMany('App\Models\Loan');
    }

    public function accounts(){
        return $this->hasMany('App\Models\Account');
    }

    public function isActive(){

        if($this->status=='Active')
        return true; 
        else 
        return false;

    }

}