
    <div class="w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
            Name
        </label>
        <input wire:model="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border  @error('name') border-red-500  @enderror rounded py-2 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Type here...">
        @error('name')
        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
        @enderror
    </div>

    <div class="w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="interest">
            Interest
        </label>
        <input wire:model="interest" class="appearance-none block w-full bg-gray-200 text-gray-700 border  @error('interest') border-red-500  @enderror rounded py-2 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" type="number" placeholder="Type here...">
        @error('interest')
        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
        @enderror
    </div>

    <div class="w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="paymentterms">
            Payment Terms
        </label>
        <input wire:model="paymentterms" class="appearance-none block w-full bg-gray-200 text-gray-700 border  @error('paymentterms') border-red-500  @enderror rounded py-2 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" type="number" placeholder="Type here...">
        @error('paymentterms')
        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
        @enderror
    </div>

    <div class="w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="maxloanammount">
            Max Ammount Loan
        </label>
        <input wire:model="maxloanammount" class="appearance-none block w-full bg-gray-200 text-gray-700 border  @error('maxloanammount') border-red-500  @enderror rounded py-2 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" type="number" placeholder="Type here...">
        @error('maxloanammount')
        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
        @enderror
    </div>

    <div class="w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="type">
            type
        </label>

        <select wire:model.defer="type" class="block appearance-none w-full bg-gray-200 border @error('type') border-red-500  @enderror border-gray-200 text-gray-700 py-2 mb-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
            <option value="" selected>Select...</option>
            <option value="Fix">Fix</option>
            <option value="Dynamic">Dynamic</option>
        </select>
        @error('type')
        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
        @enderror
    </div>
