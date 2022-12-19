<div class="w-full px-3 mb-6 md:mb-0">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="amount">
        Amount
    </label>
    <input wire:model.defer="amount" class="appearance-none block w-full bg-gray-100 text-gray-700 border  @error('amount') border-red-500  @enderror rounded py-2 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" type="number">
    @error('amount')
    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
    @enderror

    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="amount">
        Date
    </label>
    <input wire:model.defer="depositdate" class="appearance-none block w-full bg-gray-100 text-gray-700 border  @error('amount') border-red-500  @enderror rounded py-2 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" type="date">
    @error('amount')
    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
    @enderror


</div>

