<div class="w-full px-3 mb-6 md:mb-3">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold">
        Account Type
    </label>
    <select wire:model.defer="accounttype_id" class="block appearance-none w-full bg-gray-100 border @error('accounttype_id') border-red-500 @enderror text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
        <option value="" selected>Select...</option>
        @foreach ($ACCOUNTTYPE as $row)
        <option value="{{$row->id}}">{{$row->name}}</option>
        @endforeach
    </select>
    @error('accounttype_id')
    <p class="text-red-500 text-xs italic">Please fill out this field.</p>
    @enderror
</div>