<div class="p-12">

    @include('livewire.includes.messages')
    <div class="block pb-5">
        {!! $loan->employee->fullname() !!}

        <br>
        {{-- loan details  --}}

        <div>   
            Loan Amount: Php {{ number_format($loan->amount, 2, '.', ',') }} <br>
            Loan Type: {{ $loan->loantype->name }} <br>
            No. of Terms: {{ $loan->terminmonths }} <br>
            Interest: {{ $loan->interest * 100 }}%<br>
            {{-- No. of years: {{ $loan->employee->monthsInService() / 12 }}<br> --}}
            Outstanding Balance : Php {{ number_format($loan->latestPaymentSchedule()->balance,2,'.',',') }}
        </div>

        {{-- <button class="bg-green-400 hover:bg-green-600 rounded px-1 text-sm" wire:click="generatePaymentSchedule">Generate Payment Schedule</button> --}}
        <button class="bg-green-400 hover:bg-green-600 rounded px-1 text-sm" wire:click="showAddPayment">Payment</button>
    </div>

    <table class="text-xs w-full">
        <thead>
            <tr>
                <th class="border p-1">#</th>
                <th class="border p-1">Due Date</th>
                <th class="border p-1">Balance</th>
                <th class="border p-1">Principal</th>
                <th class="border p-1">Interest</th>
                <th class="border p-1">Monthly Amortization</th>
                <th class="border p-1">Status</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count=1; 
            @endphp
            @foreach($paymentschedules as $paymentschedule)
            <tr>
                <td class="border p-1">{{ $count++ }}</td>
                <td class="border p-1">{{ $paymentschedule->paymentdate->format('F d, Y') }}</td>
                <td class="border p-1 text-right">Php {{ number_format($paymentschedule->balance,2,'.',',') }}</td>
                <td class="border p-1 text-right">Php {{ number_format($paymentschedule->principal,2,'.',',') }}</td>
                <td class="border p-1 text-right">Php {{ number_format($paymentschedule->interest,2,'.',',') }}</td>
                <td class="border p-1 text-right">Php {{ number_format($paymentschedule->monthlyamort,2,'.',',') }}</td>
                <td class="border p-1 text-right">

                    @if($paymentschedule->ispaid)
                    Paid
                    @endif
                   
            </tr>


            @endforeach

            <tr>
                <td class="border p-1" colspan="3">TOTAL </td>
                <td class="border p-1 text-right">Php {{ number_format(round($loan->paymentschedules->sum('principal')),2,'.',',') }}</td>
                <td class="border p-1 text-right">Php {{ number_format($loan->paymentschedules->sum('interest'),2,'.',',') }}</td>
                <td class="border p-1 text-right">Php {{ number_format(round($loan->paymentschedules->sum('monthlyamort')),2,'.',',') }}</td>
            </tr>

        </tbody>
    </table>


    <div>Payments</div>
    <div>
        <table class="text-xs">
            <thead>
                <tr>
                    <th class="border p-1">#</th>
                    <th class="border p-1">Date</th>
                    <th class="border p-1">Due Date</th>
                    <th class="border p-1">Amount</th>
                    <th class="border p-1">Principal</th>
                    <th class="border p-1">Interest</th>
                    <th class="border p-1">Tags</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count=1; 
                @endphp
                @foreach ($loan->payments as $payment )
                    <tr>
                        <td class="border p-1">{{ $count++ }}</td>
                        <td class="border p-1">{{ $payment->paymentdate }}</td>
                        <td class="border p-1">{{ $payment->paymentdue }}</td>
                        <td class="border p-1">{{ $payment->amount }}</td>
                        <td class="border p-1">{{ $payment->principal }}</td>
                        <td class="border p-1">{{ $payment->interest }}</td>
                        <td class="border p-1">{{ $payment->tags }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

        
@include('livewire.loandetails.modal.paymentmodal')

</div>
