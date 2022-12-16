<div class="p-12">

    <div class="block mb-5">
        <span class="font-bold text-xl">Loan Accounts</span> <button class="rounded font-bold ml-5 text-xs text-white px-2 p-1 bg-teal-300 hover:bg-teal-600">Export to Excel</button>
    </div>


    <div class="block">
        <input type="text" class="rounded w-full text-sm bg-gray-300" wire:model="searchToken" placeholder="Type loan reference number here...">
    </div>


    <div>
        <table class="w-full pb-15 text-xs">
            <thead>
                <tr>
                    <td class="border font-bold p-2">Reference Number</td>
                    <td class="border font-bold p-2">Name</td>
                    <td class="border font-bold p-2">Type of Loan</td>
                    <td class="border font-bold p-2">Amount</td>
                    <td class="border font-bold p-2">Due Date</td>
                    <td class="border font-bold p-2">Balance</td>
                    <td class="border font-bold p-2">Last Payment</td>
                    <td class="border font-bold p-2">Actions</td>
                </tr>
            </thead>
            <tbody>
            <tbody>

                @foreach($loans as $loan)
                <tr>
                    <td class="border">{{ $loan->refnum }}</td>
                    <td class="border">{{ $loan->employee->fullname2() }}</td>
                    <td class="border">{{ $loan->loantype->name }}</td>

                    <td class="border">Php {{ number_format($loan->amount,2,'.',',') }}</td>

                    @if($loan->outstandingBalance()==0)

                    <td class="border" colspan="3">Paid</td>

                    @else
                    <td class="border">{{ $loan->latestPaymentSchedule()->paymentdate->format('Y-m-d') }}</td>
                    <td class="border">Php {{ number_format($loan->outstandingBalance(),2,'.',',') }}</td>
                    <td class="border">
                        @if($loan->payments->count()>0)
                        Php {{ number_format($loan->latestPayment()->amount,2,'.',',') }} - {{ $loan->latestPayment()->paymentdate }}
                        @else 
                        
                        No Payment

                        @endif
                    
                    </td>
                    @endif
                    <td class="border"> 
                        <a href="{{ route('loan',['loan_id'=>$loan->id]) }}">
                        <button
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition bg-indigo-700 px-4 py-1"
                            style="text-transform:none" wire:click="">
                            View details
                        </button>
                    </a>
                        <button
                        class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition bg-indigo-700 px-4 py-1"
                        style="text-transform:none" wire:click="deleteLoan({{ $loan->id }})">
                        Delete
                    </button>
                
                    
                    </td>
                </tr>
                @endforeach
            </tbody>
            </tbody>
        </table>
    </div>

    @include('livewire.loans.deleteloanmodal')



</div>