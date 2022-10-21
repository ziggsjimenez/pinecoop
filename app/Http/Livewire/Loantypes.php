<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Loantype;
use Livewire\WithPagination;

class Loantypes extends Component
{
    use withPagination;
    public $loantypes, $loantypid, $modaladdloantype = false;
    public $name, $interest, $minpaymentterms, $maxpaymentterms, $minloanamount, $maxloanamount, $minlengthofservice, $type;

    public function mount()
    {
        $this->loantypes = Loantype::all();
    }

    public function render()
    {
        $this->loantypes = Loantype::all();
        return view('livewire.loantypes');
    }

    public function showAddEditModal($type)
    {
        $this->loantypid = $type == 'add'? null: $this->loantypid;
        $this->modaladdloantype = true;
    }

    public function saveLoanTypes()
    {
        $this->validate([
            'name' => 'required',
            'interest' => 'required',
            'minpaymentterms' => 'required',
            'maxpaymentterms' => 'required',
            'minloanamount' => 'required',
            'maxloanamount' => 'required',
            'minlengthofservice' => 'required',
            'type' => 'required',
        ]);

        Loantype::updateOrCreate(['id' => $this->loantypid], [
            'name' => $this->name,
            'interest' => $this->interest,
            'minpaymentterms' => $this->minpaymentterms,
            'maxpaymentterms' => $this->maxpaymentterms,
            'minloanamount' => $this->minloanamount,
            'maxloanamount' => $this->maxloanamount,
            'minlengthofservice' => $this->minlengthofservice,
            'type' => $this->type,
        ]);

        $this->modaladdloantype = false;
        $this->resetInputFields();
    }

    public function editLoanType($loantypid)
    {
        $loantypes = Loantype::find($loantypid);
        $this->loantypid = $loantypes->id;
        $this->name = $loantypes->name;
        $this->interest = $loantypes->interest;
        $this->paymentterms = $loantypes->paymentterms;
        $this->maxloanamount = $loantypes->maxloanamount;
        $this->type = $loantypes->type;

        $this->showAddEditModal('edit');
    }



    private function resetInputFields()
    {
        $this->name = "";
        $this->interest = "";
        $this->paymentterms = "";
        $this->maxloanammount = "";
        $this->type = "";
    }
}
