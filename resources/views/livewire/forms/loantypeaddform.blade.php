<div class="w-full px-3 mb-4">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
        Name
    </label>
    <input wire:model="name" class="appearance-none block w-full bg-gray-100 text-gray-700 border  @error('name') border-red-500  @enderror rounded py-2 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Type here...">
    @error('name')
    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
    @enderror
</div>

<div class="flex flex-wrap mb-2">
    <div class="w-1/2 px-3 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="interest">
        Interest
        </label>
        <input wire:model="interest" class="appearance-none block w-full bg-gray-100 text-gray-700 border  @error('interest') border-red-500  @enderror rounded py-2 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" type="number" placeholder="Type here...">
        @error('interest')
        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
        @enderror
    </div>

    <div class="w-1/2 px-3 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="minsharecapital">
        Minimum Share Capital
        </label>
        <input wire:model="minsharecapital" class="appearance-none block w-full bg-gray-100 text-gray-700 border  @error('minsharecapital') border-red-500  @enderror rounded py-2 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" type="number" placeholder="Type here...">
        @error('minsharecapital')
        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
        @enderror
    </div>
    
    <div class="w-1/2 px-3 md:mb-0">
        <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="minlengthofservice">
            MIN EMPLOYMENT DATE (months)
        </label>
        <input wire:model="minlengthofservice" class="appearance-none block w-full bg-gray-100 text-gray-700 border  @error('minlengthofservice') border-red-500  @enderror rounded py-2 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" type="number" placeholder="Type here...">
        @error('minlengthofservice')
        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
        @enderror
    </div>
</div>

<div class="flex flex-wrap mb-2">
    <div class="w-1/2 px-3 md:mb-0">
        <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="minpaymentterms">
            MIN PAYMENT TERMS (months)
        </label>
        <input wire:model="minpaymentterms" class="appearance-none block w-full bg-gray-100 text-gray-700 border  @error('minpaymentterms') border-red-500  @enderror rounded py-2 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" type="number" placeholder="Type here...">
        @error('minpaymentterms')
        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
        @enderror
    </div>
    
    <div class="w-1/2 px-3 md:mb-0">
        <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="maxpaymentterms">
            MAX PAYMENT TERMS  (months)
        </label>
        <input wire:model="maxpaymentterms" class="appearance-none block w-full bg-gray-100 text-gray-700 border  @error('maxpaymentterms') border-red-500  @enderror rounded py-2 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" type="number" placeholder="Type here...">
        @error('maxpaymentterms')
        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
        @enderror
    </div>
</div>

<div class="flex flex-wrap  mb-2">
    <div class="w-1/2 px-3 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="minloanamount">
            Min Loan Ammount 
        </label>
        <input wire:model="minloanamount" class="appearance-none block w-full bg-gray-100 text-gray-700 border  @error('minloanamount') border-red-500  @enderror rounded py-2 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" type="number" placeholder="Type here...">
        @error('minloanamount')
        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
        @enderror
    </div>
    
    <div class="w-1/2 px-3 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="maxloanamount">
            Max Loan Ammount
        </label>
        <input wire:model="maxloanamount" class="appearance-none block w-full bg-gray-100 text-gray-700 border  @error('maxloanamount') border-red-500  @enderror rounded py-2 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" type="number" placeholder="Type here...">
        @error('maxloanamount')
        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
        @enderror
    </div>
</div>

<div class="w-full px-3 mb-6 md:mb-0">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="type">
        Type
    </label>

    <select wire:model.defer="type" class="block appearance-none w-full bg-gray-100 border @error('type') border-red-500  @enderror text-gray-700 py-2 mb-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
        <option value="" selected>Select...</option>
        <option value="Fix">Fix</option>
        <option value="Diminishing">Diminishing</option>
    </select>
    @error('type')
    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
    @enderror
</div>