<div class="flex justify-center">
    <div class="block p-6 rounded-lg shadow-lg bg-white w-full" style="margin: 2rem 2rem;">
        <div class="flex items-center justify-between py-2 md:justify-start md:space-x-10">
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <span class="tracking-wide text-gray-700 text-xl font-bold">ACCOUNT TYPES</span>
            </div>
            <div class="items-center justify-end md:flex md:flex-1 lg:w-0">
                <x-jet-button wire:click="showModalAccount('add')" class="pl-5" style="text-transform:none">Add account type</x-jet-button>
            </div>
        </div>
        <div>
            <div class="pb-4" style="overflow: auto;">
                <table class="w-full text-left">
                    <thead class="border-b bg-white">
                        <tr>
                            <th class="px-2 py-1">#</th>
                            <th class="px-2 py-1">Name</th>
                            <th class="px-2 py-1">Action</th>
                        </tr>
                    </thead class="border-b">
                    <tbody>
                        @php
                        $count = 1;
                        @endphp
                        @foreach ($accounttypes as $row)
                        <tr class="{{$count %2 ==0? 'bg-gray-100':'bg-white'}} transition duration-100 ease-in-out hover:bg-gray-100">
                            <td class="px-2 py-1 whitespace-nowrap">{{ $count++ }}</td>
                            <td class="px-2 py-1 whitespace-nowrap">{{ $row->name }} </td>
                            <td class="px-2 py-1 whitespace-nowrap">
                                <x-jet-button class="bg-orange-300 px-4 py-1" style="text-transform:none" wire:click="editAccountType({{ $row->id }})">Edit</x-jet-button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('livewire.modals.modalaccounttype')
        </div>
    </div>
</div>