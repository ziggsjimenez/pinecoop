<?php
namespace App\Exports;

use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EmployeesExport implements FromView
{

    private $option;

    public function __construct(string $option) 
    {
        $this->option = $option;
    }


    public function view(): View
    {

        switch($this->option){

            case "member":  return view('exports.employees', ['employees' => Employee::where('ispinecoopmem',1)->orderBy('lastname','ASC')->get(),'displayoption'=>"MEMBER"]);
                            break;
                            
            case "nonmember":   return view('exports.employees', ['employees' => Employee::where('ispinecoopmem',0)->orderBy('lastname','ASC')->get(),'displayoption'=>"NON-MEMBER"]);
                                break;

            default:    

            return view('exports.employees', ['employees' => Employee::where('id','>',0)->orderBy('lastname','ASC')->get(),'displayoption'=>"ALL"]);
                                break;

        }
        
    }
}
