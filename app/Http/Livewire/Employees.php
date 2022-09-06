<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;

class Employees extends Component
{
    use WithPagination;

    public $openAddModal=false,$employee_id,$searchToken; 
    public $lastname,$firstname,$middlename,$extension,$birthdate,$civilstatus,$sex,$religion,$department,$position,$employmentdate,$phonenumber,$educationalattainment,$estimatedannualgross,$tin,$prahouseno,$prabuildingstreet,$prasubdivision,$prabarangay,$pramun,$praprov,$prazipcode,$peahouseno,$peabuildingstreet,$peasubdivision,$peabarangay,$peamun,$peaprov,$peazipcode,$pmailadd,$email,$fbaccount,$ispinecoopmem,$dateofmembership,$pwdid,$ispersonwithdisability;    


    public function mount(){
        $this->searchToken = "";
    }

    public function render()
    {

        return view('livewire.employees', ['employees' => Employee::where('lastname', 'LIKE', '%' . $this->searchToken . '%')->orWhere('firstname', 'LIKE', '%' . $this->searchToken . '%')->orderBy('lastname','ASC')->paginate(10),]);

    }

    public function showAddModal(){

        $this->openAddModal=true;


    }

    public function closeModal(){
        $this->openAddModal=false;

    }

    public function resetInputFields(){
        $this->lastname="";
        $this->firstname="";
        $this->middlename="";
        $this->extension="";
        $this->birthdate="";
        $this->civilstatus="";
        $this->sex="";
        $this->religion="";
        $this->department="";
        $this->position="";
        $this->employmentdate="";
        $this->phonenumber="";
        $this->educationalattainment="";
        $this->estimatedannualgross="";
        $this->tin="";
        $this->prahouseno="";
        $this->prabuildingstreet="";
        $this->prasubdivision="";
        $this->prabarangay="";
        $this->pramun="";
        $this->praprov="";
        $this->prazipcode="";
        $this->peahouseno="";
        $this->peabuildingstreet="";
        $this->peasubdivision="";
        $this->peabarangay="";
        $this->peamun="";
        $this->peaprov="";
        $this->peazipcode="";
        $this->pmailadd="";
        $this->email="";
        $this->fbaccount="";
        $this->ispinecoopmem="";
        $this->dateofmembership="";
        $this->pwdid="";
        $this->ispersonwithdisability="";

    }


    public function storeEmployee(){

        $this->validate([
            'lastname'=>'required',
            'firstname'=>'required',
            'middlename'=>'required',
            'extension'=>'required',
            'birthdate'=>'required',
            'civilstatus'=>'required',
            'sex'=>'required',
            'religion'=>'required',
            'department'=>'required',
            'position'=>'required',
            'employmentdate'=>'required',
            'phonenumber'=>'required',
            'educationalattainment'=>'required',
            'estimatedannualgross'=>'required',
            'tin'=>'required',
            'prahouseno'=>'required',
            'prabuildingstreet'=>'required',
            'prasubdivision'=>'required',
            'prabarangay'=>'required',
            'pramun'=>'required',
            'praprov'=>'required',
            'prazipcode'=>'required',
            'peahouseno'=>'required',
            'peabuildingstreet'=>'required',
            'peasubdivision'=>'required',
            'peabarangay'=>'required',
            'peamun'=>'required',
            'peaprov'=>'required',
            'peazipcode'=>'required',
            'pmailadd'=>'required',
            'email'=>'required',
            'fbaccount'=>'required',
            'ispinecoopmem'=>'required',
            'dateofmembership'=>'required',
            'pwdid'=>'required',
            'ispersonwithdisability'=>'required',            
        ]);

        Employee::updateOrCreate(['id' => $this->employee_id], [
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'extension' => $this->extension,
            'birthdate' => $this->birthdate,
            'civilstatus' => $this->civilstatus,
            'sex' => $this->sex,
            'religion' => $this->religion,
            'department' => $this->department,
            'position' => $this->position,
            'employmentdate' => $this->employmentdate,
            'phonenumber' => $this->phonenumber,
            'educationalattainment' => $this->educationalattainment,
            'estimatedannualgross' => $this->estimatedannualgross,
            'tin' => $this->tin,
            'prahouseno' => $this->prahouseno,
            'prabuildingstreet' => $this->prabuildingstreet,
            'prasubdivision' => $this->prasubdivision,
            'prabarangay' => $this->prabarangay,
            'pramun' => $this->pramun,
            'praprov' => $this->praprov,
            'prazipcode' => $this->prazipcode,
            'peahouseno' => $this->peahouseno,
            'peabuildingstreet' => $this->peabuildingstreet,
            'peasubdivision' => $this->peasubdivision,
            'peabarangay' => $this->peabarangay,
            'peamun' => $this->peamun,
            'peaprov' => $this->peaprov,
            'peazipcode' => $this->peazipcode,
            'pmailadd' => $this->pmailadd,
            'email' => $this->email,
            'fbaccount' => $this->fbaccount,
            'ispinecoopmem' => $this->ispinecoopmem,
            'dateofmembership' => $this->dateofmembership,
            'pwdid' => $this->pwdid,
            'ispersonwithdisability' => $this->ispersonwithdisability,

        ]);

        $this->closeModal();
        $this->resetInputFields();

    }

    public function edit($employee_id){
        $employee = Employee::find($employee_id);
        $this->employee_id = $employee->id;
        $this->lastname=$employee->lastname;
        $this->firstname=$employee->firstname;
        $this->middlename=$employee->middlename;
        $this->extension=$employee->extension;
        $this->birthdate=$employee->birthdate;
        $this->civilstatus=$employee->civilstatus;
        $this->sex=$employee->sex;
        $this->religion=$employee->religion;
        $this->department=$employee->department;
        $this->position=$employee->position;
        $this->employmentdate=$employee->employmentdate;
        $this->phonenumber=$employee->phonenumber;
        $this->educationalattainment=$employee->educationalattainment;
        $this->estimatedannualgross=$employee->estimatedannualgross;
        $this->tin=$employee->tin;
        $this->prahouseno=$employee->prahouseno;
        $this->prabuildingstreet=$employee->prabuildingstreet;
        $this->prasubdivision=$employee->prasubdivision;
        $this->prabarangay=$employee->prabarangay;
        $this->pramun=$employee->pramun;
        $this->praprov=$employee->praprov;
        $this->prazipcode=$employee->prazipcode;
        $this->peahouseno=$employee->peahouseno;
        $this->peabuildingstreet=$employee->peabuildingstreet;
        $this->peasubdivision=$employee->peasubdivision;
        $this->peabarangay=$employee->peabarangay;
        $this->peamun=$employee->peamun;
        $this->peaprov=$employee->peaprov;
        $this->peazipcode=$employee->peazipcode;
        $this->pmailadd=$employee->pmailadd;
        $this->email=$employee->email;
        $this->fbaccount=$employee->fbaccount;
        $this->ispinecoopmem=$employee->ispinecoopmem;
        $this->dateofmembership=$employee->dateofmembership;
        $this->pwdid=$employee->pwdid;
        $this->ispersonwithdisability=$employee->ispersonwithdisability;
        $this->showAddModal();
    }

    public function delete($employee_id){
        Employee::find($employee_id)->delete();
    }
}
