<div class="p-12">

    <div class="block mb-5">
        <span class="font-bold text-xl">Days from Last Payment</span> 
        <button class="rounded font-bold ml-5 text-xs text-white px-2 p-1 bg-teal-300 hover:bg-teal-600" wire:click="export">Export to Excel</button>
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
                    <td class="border font-bold p-2">Days from Last Payment</td>
                    <td class="border font-bold p-2">Actions</td>
                </tr>
            </thead>
            <tbody>
            <tbody>

                @foreach($loans as $loan)

               
                <tr>
                    <td class="border">{{ $loan->refnum }}</td>
                    <td class="border">{{ $loan->employee->fullname2() }}</td>
                    <td class="border">{{ $loan->loantype->name}}</td>
                    <td class="border text-right">{{ number_format($loan->amount,2,'.',',') }}</td>
                    <td class="border">
                        @if($loan->latestPaymentSchedule()!=null){{ $loan->latestPaymentSchedule()->paymentdate->format('Y-m-d') }}@endif
                    </td>
                    <td class="border text-right">{{ number_format($loan->outstandingBalance(),2,'.',',') }}</td>
                    <td class="border">@if($loan->latestPayment()!=null){{ $loan->latestPayment()->paymentdate }}@endif</td>
                    <td class="border">{{ $loan->aging() }}</td>
                    <td class="border"></td>
                    
                </tr>
                @endforeach
            </tbody>
            </tbody>
        </table>
    </div>



</div>