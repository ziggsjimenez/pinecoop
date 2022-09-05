<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;

class Employees extends Component
{

    public $employees,$selectedEmployee,$openAddModal=false,$Lastname,$employee_id; 

    public function mount () {
        $this->employees = Employee::all();
    }

    public function render()
    {

        $this->employees = Employee::all();
        return view('livewire.employees');
    }

    public function showAddModal(){

        $this->openAddModal=true;


    }

    public function closeModal(){
        $this->openAddModal=false;

    }

    public function resetInputFields(){
        $this->Lastname = '';
    }

    public function viewDetails($employee_id){

        $this->selectedEmployee= Employee::find($employee_id);

    }

    public function storeEmployee(){

        $this->validate([
            'Lastname'=>'required',
        ]);



        Employee::updateOrCreate(['id' => $this->employee_id], [
            'Lastname'=> $this->Lastname,
            'date_registered'=> "2022-02-01",
        ]);




        // $employee = new Employee;



        // $employee->Lastname = $this->Lastname;
        // $employee->date_registered = "2022-02-01";

        // $employee->save();

        $this->closeModal();
        $this->resetInputFields();


    }

    public function edit($employee_id){

        $employee = Employee::find($employee_id);

        $this->Lastname = $employee->Lastname; 
        $this->employee_id = $employee->id;
        $this->showAddModal();
    }

    public function delete($employee_id){
        Employee::find($employee_id)->delete();
    }
}
