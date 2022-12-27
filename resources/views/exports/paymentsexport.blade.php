<table class="text-xs w-full">
    <thead>
        <tr>
            <th>#</th>
            <th>Loan Ref.</th>
            <th>Name</th>
            <th>Payment Date</th>
            <th>Due Date</th>
            <th>Amount</th>
            <th>Principal</th>
            <th>Interest</th>
            <th>Tags</th>
        </tr>
    </thead>
    <tbody>
        @php
            $count=1;$interest=0;$principal=0;$amount=0; 
        @endphp
        @foreach ($payments as $payment )
            <tr>
                <td>{{ $count++ }}</td>
                <td>
                        {{ $payment->loan->refnum }}
                </td>
                <td>{{ $payment->loan->employee->fullname2() }}</td>

                <td>{{ $payment->paymentdate }}</td>
                <td>{{ $payment->paymentdue }}</td>
                <td>Php {{ number_format($payment->amount,2,'.',',') }}</td>
                <td>Php {{ number_format($payment->principal,2,'.',',') }}</td>
                <td>Php {{ number_format($payment->interest,2,'.',',') }}</td>
                <td>{!! $payment->tags !!}</td>
            </tr>
            @php
                $interest+=$payment->interest;
                $principal+=$payment->principal;
                $amount+=$payment->amount;
            @endphp
        @endforeach

        <tr>
            <td colspan="3">TOTAL</td>
            <td>Php {{ number_format($amount,2,'.',',') }}</td>
            <td>Php {{ number_format($principal,2,'.',',') }}</td>
            <td>Php {{ number_format($interest,2,'.',',') }}</td>
            <td></td>
        </tr>


    </tbody>
</table>