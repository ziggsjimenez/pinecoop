<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Loantype;
use Livewire\WithPagination;

class Loantypes extends Component
{
    use withPagination;
    public $loantypes, $loantypid, $modaladdloantype = false;
    public $name, $interest, $paymentterms, $maxloanammount, $type;

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
            'paymentterms' => 'required',
            'maxloanammount' => 'required',
            'type' => 'required',
        ]);

        Loantype::updateOrCreate(['id' => $this->loantypid], [
            'name' => $this->name,
            'interest' => $this->interest,
            'paymentterms' => $this->paymentterms,
            'maxloanammount' => $this->maxloanammount,
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
        $this->maxloanammount = $loantypes->maxloanammount;
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
