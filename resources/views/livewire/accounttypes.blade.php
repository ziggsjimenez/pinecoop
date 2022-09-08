<div class="p-12">
    <div class="mb-5">
        <span class="uppercase tracking-wide text-gray-700 text-xl font-bold mb-2">ACCOUNT TYPES</span>
        <x-jet-button wire:click="showModalAccount('add')" class="pl-5">ADD</x-jet-button>
    </div>
    <br>
    <table class="w-full">
        <thead>
            <tr>
                <th class="border p-1 border-black text-center">#</th>
                <th class="border p-1 border-black text-center">Name </th>
                <th class="border p-1 border-black text-center">Action</th>
            </tr>
        </thead>

        <tbody>
            @php
            $count = 1;
            @endphp
            @foreach ($accounttypes as $row)
            <tr>
                <td class="border p-1 border-black">{{ $count++ }}</td>
                <td class="border p-1 border-black">{{ $row->name }} </td>
                <td class="border p-1 border-black">
                    <x-jet-button class="bg-orange-300 p-2" wire:click="editAccountType({{ $row->id }})">Edit</x-jet-button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @include('livewire.modals.modalaccounttype')
</div>