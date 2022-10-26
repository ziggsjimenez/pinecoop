<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;

class Employee extends Model
{
    use HasFactory;


    protected $fillable = [
        'lastname',
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

    public function fullname()
    {
        $badge = "";
        if ($this->isActive())
            $badge = '<span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-green-500 text-white rounded">Active</span>';
        else
            $badge = '<span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-red-600 text-white rounded">Inactive</span>';
        return  $this->lastname . ", " . $this->firstname . " " . $this->middlename . " " . $this->extension . "  " . $badge;
    }

    public function fullname2()
    {
        return  $this->lastname . ", " . $this->firstname . " " . $this->middlename . " " . $this->extension;
    }

    public function praddress()
    {
        return $this->prahouseno . " " . $this->prabuildingstreet . " " . $this->prasubdivision . " " . $this->prabarangay . " " . $this->pramun . " " . $this->praprov;
    }

    public function peaddress()
    {
        return $this->peahouseno . " " . $this->peabuildingstreet . " " . $this->peasubdivision . " " . $this->peabarangay . " " . $this->peamun . " " . $this->peaprov;
    }

    public function loans()
    {
        return $this->hasMany('App\Models\Loan');
    }

    public function accounts()
    {
        return $this->hasMany('App\Models\Account');
    }

    public function isActive()
    {

        if ($this->status == 'Active')
            return true;
        else
            return false;
    }

    public function hasPendingLoans()
    {

        $haspendingloans = false;

        foreach ($this->loans as $loan) {
            if ($loan->status == "Pending") {
                $haspendingloans = true;
                break;
            }
        }

        return $haspendingloans;
    }

    public function monthsInService(){

        $now = Carbon::parse(date('Y-m-d'));
  
        return  $now->diffInMonths($this->employmentdate);
        
    }
}
