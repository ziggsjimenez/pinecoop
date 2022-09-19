<div class="p-12">


    <div class="block pb-5">
        
        <div class="font-bold text-xl">
            {!! $loan->employee->fullname() !!}
        </div>
        <br>
        {{-- loan details  --}}

        <div class="rounded-md bg-blue-200 p-5 mb-10">

            <table>
                <tr>
                    <td class="px-5">Loan Amount: Php {{ number_format($loan->amount,2,'.',',') }} </td>
                    <td class="px-5">Loan Type: {{ $loan->loantype->name }} </td>
                    <td class="px-5">No. of Terms: {{ $loan->terminmonths }}</td>
                    <td class="px-5">Interest: {{ $loan->interest*100 }} %</td>
                    <td class="px-5">Status: {{ $loan->status }} </td>
                </tr>
            </table>

        </div>

        <a href="{{ route('member',['employee_id'=>$loan->employee->id]) }}">
            <x-jet-button class="bg-gray-400"><i class="fa-solid fa-circle-left fa-2x"></i> Back </x-jet-button>
        </a>

        <x-jet-button class="bg-orange-400"><i class="fa-solid fa-pen-to-square fa-2x"></i> Edit</x-jet-button>

        <x-jet-button wire:click="openApproveLoanModal" class="bg-blue-400"><i class="fa-solid fa-thumbs-up fa-2x"></i>Approve</x-jet-button>
    </div>


    {{-- payment schedule --}}

 <x-jet-button wire:click="generateSchedule"> GENERATE PAYMENT SCHEDULE </x-jet-button>


 <div>
    <table class="text-xs">
        <thead>
            <tr>
                <th class="border p-1">#</th>
                <th class="border p-1">Payment Date</th>
                <th class="border p-1">Balance</th>
                <th class="border p-1">Principal</th>
                <th class="border p-1">Interest</th>
                <th class="border p-1">Monthly Amortization</th>
                <th class="border p-1">Action</th>

            </tr>
        </thead>
        <tbody>
            @php
                
                $count = 1;

            @endphp
            @foreach ($loan->paymentschedules as $sked )
                <tr>
                    <td class="border p-1">{{ $count++ }}</td>
                    <td class="border p-1">{{ $sked->paymentdate->format('F d, Y') }}</td>
                    <td class="border p-1 text-right">Php {{ number_format($sked->balance,2,'.',',') }}</td>
                    <td class="border p-1 text-right">Php {{ number_format($sked->principal,2,'.',',') }}</td>
                    <td class="border p-1 text-right">Php {{ number_format($sked->interest,2,'.',',') }}</td>
                    <td class="border p-1 text-right">Php {{ number_format($sked->monthlyamort,2,'.',',') }}</td>
                    <td class="border p-1 text-right">

                        <x-jet-button>Paid</x-jet-button>
                        <x-jet-button>Cash Payment</x-jet-button>
                    </td>

                </tr>
            @endforeach
            <tr>
                <td class="border p-1"></td>
                <td class="border p-1"></td>
                <td class="border p-1"></td>
                <td class="border p-1 text-right font-bold">Php {{ number_format($loan->paymentschedules->sum('principal'),2,'.',',') }}</td>
                <td class="border p-1 text-right font-bold">Php {{ number_format($loan->paymentschedules->sum('interest'),2,'.',',') }}</td>
                <td class="border p-1 text-right font-bold">Php {{ number_format($loan->paymentschedules->sum('monthlyamort'),2,'.',',') }}</td>
                <td></td>

            </tr>
        </tbody>
    </table>
 </div>

 @include('livewire.loandetails.modals.approveLoanModal')


</div>
