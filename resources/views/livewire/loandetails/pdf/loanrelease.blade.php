<div class="p-12">

    <div class="font-bold text-2xl">
        LOAN RELEASE
    </div>

    


    <div class="block pb-5">
        {!! $loan->employee->fullname() !!}

        <br>
        {{-- loan details  --}}

        <div class="my-5">
            
            
            <table class="text-sm">
                <thead>
                    <tr>
                        <th class="border bg-gray-400 px-3">Reference Number</th>
                        <th class="border bg-gray-400 px-3">Loan Amount</th>
                        <th class="border bg-gray-400 px-3">Loan Type</th>
                        <th class="border bg-gray-400 px-3">No. of Terms</th>
                        <th class="border bg-gray-400 px-3">Interest</th>

                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center border px-3">{{ $loan->refnum }}</td>
                    <td class="text-center border px-3">Php {{ number_format($loan->amount, 2, '.', ',') }}</td>
                    <td class="text-center border px-3">{{ $loan->loantype->name }}</td>
                    <td class="text-center border px-3">{{ $loan->terminmonths }}</td>
                    <td class="text-center border px-3">{{ $loan->interest * 100 }}%</td>

                </tr>
            </tbody>
            </table>
            <hr>
        </div>



        

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

            </tr>
        </thead>
        <tbody>
            @php
                $count=1; 
            @endphp
            @foreach($loan->paymentschedules as $paymentschedule)
            <tr>
                <td class="border p-1">{{ $count++ }}</td>
                <td class="border p-1">{{ $paymentschedule->paymentdate->format('F d, Y') }}</td>
                <td class="border p-1 text-right">Php {{ number_format($paymentschedule->balance,2,'.',',') }}</td>
                <td class="border p-1 text-right">Php {{ number_format($paymentschedule->principal,2,'.',',') }}</td>
                <td class="border p-1 text-right">Php {{ number_format($paymentschedule->interest,2,'.',',') }}</td>
                <td class="border p-1 text-right">Php {{ number_format($paymentschedule->monthlyamort,2,'.',',') }}</td>
                   
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


    <div>
        <table class="text-sm">
            <tr class="font-bold">
                <td>Loan Amount:</td><td class="text-right">Php {{ number_format($loan->amount,2,'.',',') }}</td>
            </tr>
            <tr>
                <td>LESS: </td>
            </tr>
            <tr>
                <td>Processing Fee: </td><td class="text-right">Php {{ number_format($loan->processingfee(),2,'.',',') }}</td>
            </tr>
            <tr>
                <td>Insurance</td><td class="text-right">Php {{ number_format($loan->insurance(),2,'.',',') }}</td>
            </tr>
            <tr class="font-bold">
                <td>NET Amount</td> <td class="text-right">Php {{ number_format($loan->netamount(),2,'.',',') }}</td>
            </tr>
        </table>
    </div>







</div>
