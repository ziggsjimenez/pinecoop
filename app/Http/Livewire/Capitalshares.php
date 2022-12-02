<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\Employee;
use App\Models\Setting;
use App\Models\Tempcapitalshare;
use App\Models\Transaction;
use Livewire\Component;
use Illuminate\Support\Str;
use Auth; 

class Capitalshares extends Component
{
    public $dateapplied, $tempCapitalShares,$amount,$showEditForm; 

    public function mount(){
        

        $this->PopulateAmount(); 
        $this->tempCapitalShares = Tempcapitalshare::all(); 
    }

    public function PopulateAmount(){
     
        $this->EmptyTempCapitalShareTable(); 
        $this->PopulateTempCapitalShareTable(); 

    }

    private function EmptyTempCapitalShareTable(){ 
        foreach(Tempcapitalshare::all() as $cs){
            $cs->delete(); 
        }
    }

    private function PopulateTempCapitalShareTable(){
        foreach(Employee::where('ispinecoopmem',1)->get() as $emp){
            Tempcapitalshare::insert([
                'employee_id'=>$emp->id, 
                'amount'=>Setting::first()->empsharecap,
            ]);
        }
    }

    public function UpdateArrayValue($cs_id){
        $cs = Tempcapitalshare::find($cs_id); 
        $cs->amount = $this->amount[$cs_id];
        $cs->save();
        $this->showEditForm = ""; 
    }

    public function OpenEditForm($id){
        $this->showEditForm = $id; 
    }

    public function SaveCapitalShares(){
        $this->validate([
            'dateapplied'=>'required',
        ]);

        foreach(Tempcapitalshare::all() as $tcs){

            if($tcs->amount>0){

                $this->GetCapitalShareAccount($tcs->employee_id);

                Transaction::create([
                    'transaction_reference_number'=>'CAP'.date('Ymdhis').Str::padLeft($tcs->employee_id,5,'0'), 
                    'amount'=>$tcs->amount, 
                    'dateoftransaction'=>date('Y-m-d'),
                    'account_id'=>$this->GetCapitalShareAccount($tcs->employee_id),
                    'user_id'=>Auth::user()->id,
                ]);

                $tcs->remarks = "Posted";
                $tcs->save(); 

            }

        }
        $this->EmptyTempCapitalShareTable();
    }

    private function GetCapitalShareAccount($employee_id){

        return Account::where('employee_id',$employee_id)->where('accounttype_id',2)->first()->id;

    }

    public function render()
    {
        $this->tempCapitalShares = Tempcapitalshare::all(); 
        return view('livewire.capitalshares.index');
    }


}
