<div class="flex justify-center">
    <div class="block p-6 w-full" style="margin: 2rem 2rem;">



        <div class="grid grid-cols-2 gap-4">
            <div>
                <span class="font-bold text-2xl">
                    {!! $EMPLOYEE->fullname() !!}
                </span>
                <button wire:click="confirmChangeStatus({{ $EMPLOYEE->id }})" type="button"
                    class="px-6 py-1 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">Change
                    Status</button>
                <hr>
                {{-- back button  --}}
                <a href="{{ route('employees') }}">
                    <button class="rounded px-5 py-2 text-sm bg-blue-400 hover:bg-blue-500 font-bold"><i
                            class="fa-regular fa-circle-left"></i> Back</button>
                </a>

                @include('livewire.includes.messages')
            </div>
            <!-- ... -->
            <div>
                <img class="border rounded-full" src="{{ asset('storage/profilephotos/' . $EMPLOYEE->profilephoto) }}"
                    alt="Profile Photo" width="150px">
            </div>
        </div>


        <div class="flex font-bold text-2xl mb-4">
            <div>
                {{-- <x-jet-button class="bg-red-300 px-4 py-1" style="text-transform:none" wire:click="confirmChangeStatus({{ $EMPLOYEE->id }})">Change Status</x-jet-button> --}}
            </div>

            <div class="flex">

            </div>
        </div>
        <ul class="flex flex-row  md:space-x-10 list-none border-b-0 pl-0" style="margin: 0rem;">
            <li style="margin-left: 0px;">
                <button
                    @if ($btnSelected == 'Profile') class="rounded-t-lg bg-white px-6 py-2 cursor-pointer" @else class="cursor-pointer rounded-t-lg px-6 py-2" @endif
                    wire:click="selectButton('Profile')">Profile</button>
            </li>
            <li style="margin-left: 0px;">
                <button
                    @if ($btnSelected == 'Accounts') class="rounded-t-lg bg-white px-6 py-2 cursor-pointer" @else class="cursor-pointer rounded-t-lg px-6 py-2" @endif
                    wire:click="selectButton('Accounts')">Account</button>
            </li>
            <li style="margin-left: 0px;">
                <button
                    @if ($btnSelected == 'Loans') class="rounded-t-lg bg-white px-6 py-2 cursor-pointer" @else class="cursor-pointer rounded-t-lg px-6 py-2" @endif
                    wire:click="selectButton('Loans')">Loan</button>
            </li>
        </ul>
        <div>
            <div class="block p-6 rounded-b-lg shadow-lg bg-white w-full" style="margin: 0rem;">
                <!-- PROFILE -->
                @if ($btnSelected == 'Profile')
                    <div>
                        <h1 class="font-bold text-2xl justify-center inline">Profile</h1>

                        @php
                            $accountxx = DB::table('accounts as a')
                                ->join('accounttypes', 'a.accounttype_id', '=', 'accounttypes.id')
                                ->where('employee_id', $this->employee_id)
                                ->where('accounttypes.name', 'LIKE', '%capital shares%');
                        @endphp
                        @if ($accountxx->count() != 0)
                            <a href="{{ route('account', ['account_id' => $accountxx->pluck('a.id')->first()]) }}">
                                <button
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition bg-indigo-700 px-4 py-1"
                                    style="text-transform:none" wire:click="">
                                    See Captital Shares
                                </button>
                            </a>
                        @endif

                        <div class="flex w-100">
                            <div style="width: 60%;">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="font-bold p-2">Name: </td>
                                            <td class="font-bold pl-5 p-2">{!! $EMPLOYEE->fullname() !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div style="width: 40%;">

                                <h5 class="font-bold text-2xl">Accounts </h5>

                                <table class="w-full pb-15">
                                    <thead>
                                        <tr>
                                            <th class="border p-1">Account Type</th>
                                            <th class="border p-1">Date Opened</th>
                                            <th class="border p-1">Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @foreach($EMPLOYEE->accounts as $account)
                                        <tr>
                                            <td class="border p-1">{{ $account->accounttype->name }}</td>
                                            <td class="border p-1">{{ $account->date_opened->format('F d, Y') }}</td>
                                            <td class="border p-1 text-right">Php {{ number_format($account->balance(),2,'.',',') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <hr>


                                <h5>Loan Summary</h5>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="font-bold p-2">Type of Loan</td>
                                            <td class="font-bold p-2">Due Date</td>
                                            <td class="font-bold p-2">Balance</td>
                                            <td class="font-bold p-2">Monthly Amortization</td>
                                            <td class="font-bold p-2">Actions</td>
                                        </tr>
                                        <tr>
                                            <td>xxxx</td>
                                            <td>xxxx</td>
                                            <td>xxxx</td>
                                            <td>xxxx</td>
                                            <td> <button
                                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition bg-indigo-700 px-4 py-1"
                                                    style="text-transform:none" wire:click="">
                                                    View details
                                                </button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                @endif




                <!-- ACCOUNT -->
                @if ($btnSelected == 'Accounts')
                    <div>
                        <div class="flex items-center justify-between py-2 md:justify-start md:space-x-10">
                            <div class="items-center justify-end md:flex md:flex-1 lg:w-0">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition pl-5"
                                    wire:click="showMemberAccountModal('add')" style="text-transform:none">
                                    <i class="fa-solid fa-plus"></i>&nbsp;Add Account
                                </button>
                            </div>
                        </div>

                        <div class="pb-4" style="overflow: auto;">
                            <table class="w-full text-left">
                                <thead class="border-b bg-white">
                                    <tr>
                                        <th class="px-2 py-1">#</th>
                                        <th class="px-2 py-1">Account Type</th>
                                        <th class="px-2 py-1">Date Opened</th>
                                        <th class="px-2 py-1">Balance</th>
                                        <th class="px-2 py-1">Action</th>
                                    </tr>
                                </thead class="border-b">
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($EMPLOYEE->accounts as $row)
                                        <tr class="transition duration-100 ease-in-out hover:bg-gray-100">
                                            <td class="px-2 py-1 whitespace-nowrap">{{ $count++ }}</td>
                                            <td class="px-2 py-1 whitespace-nowrap">{{ $row->accounttype->name }}</td>
                                            <td class="px-2 py-1 whitespace-nowrap">
                                                {{ $row->date_opened->format('F d, Y') }}</td>

                                            <td class="px-2 py-1 whitespace-nowrap">Php {{ number_format($row->balance(),2,'.',',') }}</td>    
                                            <td class="px-2 py-1 whitespace-nowrap">
                                                <a href="{{ route('account', ['account_id' => $row->id]) }}">
                                                    <x-jet-button class="bg-indigo-700 px-4 py-1"
                                                        style="text-transform:none">View Details</x-jet-button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @include('livewire.modals.addmemberaccountmodal')
                @endif





                <!-- LOAN -->
                @if ($btnSelected == 'Loans')
                    <div>
                        <div class="flex items-center justify-between py-2 md:justify-start md:space-x-10">
                            <div class="items-center justify-end md:flex md:flex-1 lg:w-0">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition pl-5"
                                    wire:click="showMemberLoanModal('add')" style="text-transform:none">
                                    <i class="fa-solid fa-plus"></i>&nbsp;Add Loan
                                </button>
                            </div>
                        </div>

                        <div class="pb-4" style="overflow: auto;">
                            <table class="w-full text-left">
                                <thead class="border-b bg-white">
                                    <tr>
                                        <th class="px-2 py-1">ID</th>
                                        <th class="px-2 py-1">Date</th>
                                        <th class="px-2 py-1">Type of Loan</th>
                                        <th class="px-2 py-1">Loan Amount</th>
                                        <th class="px-2 py-1">Interest</th>
                                        <th class="px-2 py-1">Interest Type</th>
                                        <th class="px-2 py-1">Payment Terms</th>
                                        <th class="px-2 py-1">Outstanding Balance</th>
                                        <th class="px-2 py-1">Status</th>
                                        <th class="px-2 py-1">Action</th>
                                    </tr>
                                </thead class="border-b">
                                <tbody>
                                    @foreach ($EMPLOYEE->loans as $row)
                                        <tr class="transition duration-100 ease-in-out hover:bg-gray-100">
                                            <td class="px-2 py-1 whitespace-nowrap">{{ $row->id }}</td>
                                            <td class="px-2 py-1 whitespace-nowrap">
                                                {{ $row->dateapplied->format('F d, Y') }}</td>
                                            <td class="px-2 py-1 whitespace-nowrap">{{ $row->loantype->name }}</td>
                                            <td class="px-2 py-1 whitespace-nowrap">Php
                                                {{ number_format($row->amount, 2, '.', ',') }}</td>

                                            <td class="px-2 py-1 whitespace-nowrap">{{ $row->interest * 100 }}%</td>
                                            <td class="px-2 py-1 whitespace-nowrap">{{ $row->loantype->type }}</td>
                                            <td class="px-2 py-1 whitespace-nowrap">
                                                {{ $row->terminmonths . ' Months' }}
                                            </td>
                                            <td class="px-2 py-1 whitespace-nowrap"></td>
                                            <td class="px-2 py-1 whitespace-nowrap">{{ $row->status }}</td>
                                            <td class="px-2 py-1 whitespace-nowrap">
                                                <a href="{{ route('loan', ['loan_id' => $row->id]) }}">
                                                    <x-jet-button class="bg-indigo-700 px-4 py-1"
                                                        style="text-transform:none" wire:click="">View Details
                                                    </x-jet-button>
                                                </a>

                                                <x-jet-button class="bg-red-900 px-4 py-1"
                                                style="text-transform:none">Terminate Account</x-jet-button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @include('livewire.modals.addmemberloanmodal')
                @endif
            </div>
        </div>
    </div>
    @include('livewire.employees.modals.confirmChangeStatusModal')
</div>
