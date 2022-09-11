<div class="w-full px-3 mb-6 md:mb-3">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold">
        Loan Type
    </label>
    <select wire:model.defer="loantype_id" wire:change="changeloantype" class="block appearance-none w-full bg-gray-100 border @error('loantype_id') border-red-500 @enderror text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
        <option value="" selected>Select...</option>
        @foreach ($LOANTYPE as $row)
        <option value="{{$row->id}}">{{$row->name}}</option>
        @endforeach
    </select>
    @error('loantype_id')
    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
    @enderror
</div>

<div class="w-full px-3 mb-6 md:mb-3">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="interest">
        Interest
    </label>
    <input wire:model="interest" value="{{$interest}}" class="appearance-none block w-full bg-gray-100 text-gray-700 border  @error('interest') border-red-500  @enderror rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white" type="number" readonly>
    @error('interest')
    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
    @enderror
</div>

<div class="w-full px-3 mb-6 md:mb-3">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="interesttype">
        Interest Type
    </label>
    <input wire:model="interesttype" value="{{$interesttype}}" class="appearance-none block w-full bg-gray-100 text-gray-700 border  @error('interesttype') border-red-500  @enderror rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white" type="text" readonly>
    @error('interesttype')
    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
    @enderror
</div>

<div class="w-full px-3 mb-6 md:mb-3">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="paymentterms">
        Payment Terms
    </label>
    <input wire:model="paymentterms" value="{{$paymentterms}}" class="appearance-none block w-full bg-gray-100 text-gray-700 border  @error('paymentterms') border-red-500  @enderror rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white" type="number" readonly>
    @error('paymentterms')
    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
    @enderror
</div>

<div class="w-full px-3 mb-6 md:mb-3">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="loan_amount">
        Loan Amount
    </label>
    <input wire:model="loan_amount" class="appearance-none block w-full bg-gray-100 text-gray-700 border  @error('loan_amount') border-red-500  @enderror rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white" type="number" placeholder="Type here...">
    @error('loan_amount')
    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
    @enderror
</div>