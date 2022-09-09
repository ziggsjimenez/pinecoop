
    <div class="px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
            Account Name
        </label>
        <input wire:model="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border  @error('name') border-red-500  @enderror rounded py-2 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Type here...">
        @error('name')
        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
        @enderror
    </div>

