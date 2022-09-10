<div class="p-12">
    <div class="block bg-green-100 p-10">

        <div class="mb-5">
            <span class="uppercase tracking-wide text-gray-700 text-xl font-bold mb-2">Members</span>
            <x-jet-button wire:click="showAddModal" class="pl-5">ADD</x-jet-button>
        </div>
        <br>

        <input wire:model="searchToken"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            type="text" placeholder="Type here to search...">

        <br>

        <table class="w-full">
            <thead>
                <tr>
                    <th class="border p-1 border-black text-center">#</th>
                    <th class="border p-1 border-black text-center">Name</th>
                    <th class="border p-1 border-black text-center">Birthday</th>
                    <th class="border p-1 border-black text-center">Sex</th>
                    <th class="border p-1 border-black text-center">P. R. Address</th>
                    <th class="border p-1 border-black text-center">P. E. Address</th>
                    <th class="border p-1 border-black text-center">Action</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $count = 1;
                @endphp
                @foreach ($members as $member)
                    <tr>
                        <td class="border p-1 border-black">{{ $count++ }}</td>
                        <td class="border p-1 border-black">{{ $member->fullname() }} </td>
                        <td class="border p-1 border-black">{{ $member->birthdate->format('F d, Y') }} </td>
                        <td class="border p-1 border-black">{{ $member->sex }} </td>
                        <td class="border p-1 border-black">{{ $member->praddress() }} </td>
                        <td class="border p-1 border-black">{{ $member->peaddress() }} </td>
                        <td class="border p-1 border-black">
                            <a href="{{ route('member', ['member_id' => $member->id]) }}">
                                <x-jet-button class="bg-green-800 p-2">View</x-jet-button>
                            </a>
                            <x-jet-button class="bg-orange-300 p-2" wire:click="edit({{ $member->id }})">Edit
                            </x-jet-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
