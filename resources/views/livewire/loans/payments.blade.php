<div class="p-12">

    <div class="block mb-5">
        <span class="font-bold text-xl">Payments</span> <button class="rounded font-bold ml-5 text-xs text-white px-2 p-1 bg-teal-300 hover:bg-teal-600">Export to Excel</button>
    </div>


    <div class="block pb-5 text-sm">
        Select Range ... From <input class="text-sm" wire:model="fromdate" type="date"> To <input class="text-sm"  wire:model="todate" type="date">
    </div>


    <div>
        <table class="text-xs w-full">
            <thead>
                <tr>
                    <th class="border p-1">#</th>
                    <th class="border p-1">Loan Ref.</th>
                    <th class="border p-1">Name</th>
                    <th class="border p-1">Payment Date</th>
                    <th class="border p-1">Due Date</th>
                    <th class="border p-1">Amount</th>
                    <th class="border p-1">Principal</th>
                    <th class="border p-1">Interest</th>
                    <th class="border p-1">Tags</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count=1;$interest=0;$principal=0;$amount=0; 
                @endphp
                @foreach ($payments as $payment )
                    <tr>
                        <td class="border p-1">{{ $count++ }}</td>
                        <td class="border p-1 text-blue underline">
                            <a href="{{ route('loan',['loan_id'=>$payment->loan->id]) }}">
                                {{ $payment->loan->refnum }}
                            </a>
                        </td>
                        <td class="border p-1">{{ $payment->loan->employee->fullname2() }}</td>

                        <td class="border p-1">{{ $payment->paymentdate }}</td>
                        <td class="border p-1">{{ $payment->paymentdue }}</td>
                        <td class="border p-1 text-right">Php {{ number_format($payment->amount,2,'.',',') }}</td>
                        <td class="border p-1 text-right">Php {{ number_format($payment->principal,2,'.',',') }}</td>
                        <td class="border p-1 text-right">Php {{ number_format($payment->interest,2,'.',',') }}</td>
                        <td class="border p-1">{!! $payment->tags !!}</td>
                    </tr>
                    @php
                        $interest+=$payment->interest;
                        $principal+=$payment->principal;
                        $amount+=$payment->amount;
                    @endphp
                @endforeach

                <tr>
                    <td class="border p-1 text-center font-bold" colspan="3">TOTAL</td>
                    <td class="border p-1 text-right font-bold">Php {{ number_format($amount,2,'.',',') }}</td>
                    <td class="border p-1 text-right font-bold">Php {{ number_format($principal,2,'.',',') }}</td>
                    <td class="border p-1 text-right font-bold">Php {{ number_format($interest,2,'.',',') }}</td>
                    <td class="border p-1"></td>
                </tr>


            </tbody>
        </table>
    </div>

</div>

