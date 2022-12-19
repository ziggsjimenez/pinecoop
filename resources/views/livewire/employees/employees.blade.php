
<div class="flex justify-center">
    <div class="block p-6 rounded-lg shadow-lg bg-white w-full" style="margin: 2rem 2rem;">
        <div class="flex items-center justify-between py-2 md:justify-start md:space-x-10">
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <span class="tracking-wide text-gray-700 text-xl font-bold">EMPLOYEES</span>
                <button class="rounded font-bold ml-5 text-xs text-white px-2 p-1 bg-teal-300 hover:bg-teal-600" wire:click="export">Export to Excel</button>
            </div>
            <div class="items-center justify-end md:flex md:flex-1 lg:w-0">
                <x-jet-button wire:click="showAddModal" class="pl-5" style="text-transform:none">Add employee
                </x-jet-button>
            </div>
        </div>
        <input wire:model="searchToken"
            class="appearance-none block w-full text-gray-700 border rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            type="text" placeholder="Type here to search...">
        <div>
            <div class="pb-4" style="overflow: auto;">
                <table class="w-full text-left">
                    <thead class="border-b bg-white">
                        <tr>
                            <th class="px-2 py-1">#</th>
                            <th class="px-2 py-1">Name</th>
                            <th class="px-2 py-1">Birthday</th>
                            <th class="px-2 py-1">Sex</th>
                            <th class="px-2 py-1">P. R. Address</th>
                            <th class="px-2 py-1">Employement Date</th>
                            <th class="px-2 py-1">Membership Span</th>
                            <th class="px-2 py-1 text-center">Action</th>
                        </tr>
                    </thead class="border-b">
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($employees as $employee)
                            @php
                                $datetime1 = new DateTime($employee->dateofmembership);
                                $datetime2 = new DateTime(date('Y-m-d h:i:s'));
                                
                                $interval = $datetime1->diff($datetime2);
                                $diffInDays = $interval->d != 0 ? ($interval->d > 1 ? $interval->d . ' Days' : $interval->d . ' Day') : '';
                                $diffInMonths = $interval->m != 0 ? ($interval->m > 1 ? $interval->m . ' Months' : $interval->m . ' Month') : '';
                                $diffInYears = $interval->y != 0 ? ($interval->y > 1 ? $interval->y . ' Years' : $interval->y . ' Year') : '';
                            @endphp
                            <tr
                                class="{{ $count % 2 == 0 ? 'bg-gray-100' : 'bg-white' }} transition duration-100 ease-in-out hover:bg-gray-100">
                                <td class="px-2 py-1 whitespace-nowrap">{{ $count++ }}</td>
                                <td class="px-2 py-1 whitespace-nowrap">{!! $employee->fullname() !!} </td>
                                <td class="px-2 py-1 whitespace-nowrap">{{ $employee->birthdate->format('F d, Y') }}
                                </td>
                                <td class="px-2 py-1 whitespace-nowrap">{{ $employee->sex }} </td>
                                <td class="px-2 py-1 whitespace-nowrap">{{ $employee->praddress() }} </td>
                                <td class="px-2 py-1 whitespace-nowrap">
                                    {{ $employee->dateofmembership->format('F d, Y') }} 
                                
                                    @if(!$employee->ispinecoopmem) <button class="bg-orange-400 rounded text-xs px-3">Non-Member</button>@endif
                                     
                                </td>
                                <td class="px-2 py-1 whitespace-nowrap">
                                    {{ $diffInYears . ' ' . $diffInMonths . ' ' . $diffInDays }}
                                </td>
                                <td class="px-2 py-1 whitespace-nowrap">
                                    <div class="flex items-center justify-center">
                                        <div class="inline-flex shadow-md hover:shadow-lg focus:shadow-lg"
                                            role="group">
                                            <a href="{{ route('member', ['employee_id' => $employee->id]) }}">
                                                <button type="button"
                                                    class="rounded-l inline-block px-4 py-1.5 bg-green-500 text-white font-medium text-xs leading-tight hover:bg-green-600 focus:bg-green-600 focus:outline-none focus:ring-0 active:bg-green-700 transition duration-150 ease-in-out">View</button>
                                            </a>
                                            <button type="button" wire:click="edit({{ $employee->id }})"
                                                class="inline-block px-4 py-1.5 bg-yellow-500 text-white font-medium text-xs leading-tight hover:bg-yellow-600 focus:bg-yellow-600 focus:outline-none focus:ring-0 active:bg-yellow-600 transition duration-150 ease-in-out">Edit</button>

                                            <button type="button"
                                                wire:click="showAddCapitalSharesFucntion({{ $employee->id }})"
                                                class="inline-block px-4 py-1.5 bg-blue-600 text-white font-medium text-xs leading-tight hover:bg-blue-700 focus:bg-blue-700 focus:outline-none focus:ring-0 active:bg-blue-800 transition duration-150 ease-in-out">Add Capital</button>
                                            <button type="button"
                                                wire:click="confirmChangeStatus({{ $employee->id }})"
                                                class="inline-block px-4 py-1.5 bg-blue-600 text-white font-medium text-xs leading-tight hover:bg-blue-700 focus:bg-blue-700 focus:outline-none focus:ring-0 active:bg-blue-800 transition duration-150 ease-in-out">Change
                                                Status</button>

                                            <button type="button"
                                                wire:click="openAddProfilePhotoModal({{ $employee->id }})"
                                                class="rounded-r inline-block px-4 py-1.5 bg-purple-600 text-white font-medium text-xs leading-tight hover:bg-purple-700 focus:bg-purple-700 focus:outline-none focus:ring-0 active:bg-blue-800 transition duration-150 ease-in-out">Upload
                                                Photo</button>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="8">
                                {{ $employees->links() }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            @if ($showAddProfilePhotoModal)
                @include('livewire.employees.modals.addprofilephoto')
            @endif

            @include('livewire.employees.modals.addemployeemodal')
            @include('livewire.employees.modals.addemployeecapitalshare')
            @include('livewire.employees.modals.confirmChangeStatusModal')
            @include('livewire.includes.messages')
        </div>
    </div>
</div>
