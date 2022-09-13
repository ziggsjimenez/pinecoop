<div class="p-12">


    {{ $loan->employee->fullname() }}

    <br>

    Loan Amount: Php {{ number_format($loan->loan_amount,2,'.',',') }} <br>
    Loan Type: {{ $loan->loantype->name }} <br>
    No. of Terms: {{ $loan->no_of_terms }} <br>
    Interest: {{ $loan->interest*100 }} %<br>
  

  <br>

 
 <x-jet-button wire:click="generateSchedule"> GENERATE PAYMENT SCHEDULE </x-jet-button>


 <div>
    <table>
        <thead>
            <tr>
                <th class="border p-1">#</th>
                <th class="border p-1">Payment Date</th>
                <th class="border p-1">Balance</th>
                <th class="border p-1">Principal</th>
                <th class="border p-1">Interest</th>
                <th class="border p-1">Monthly Amortization</th>

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

                </tr>
            @endforeach
            <tr>
                <td class="border p-1"></td>
                <td class="border p-1"></td>
                <td class="border p-1 text-right font-bold">Php {{ number_format($loan->paymentschedules->sum('principal'),2,'.',',') }}</td>
                <td class="border p-1 text-right font-bold">Php {{ number_format($loan->paymentschedules->sum('interest'),2,'.',',') }}</td>
                <td class="border p-1 text-right font-bold">Php {{ number_format($loan->paymentschedules->sum('monthlyamort'),2,'.',',') }}</td>
                <td class="border p-1"></td>
            </tr>
        </tbody>
    </table>
 </div>


</div>
