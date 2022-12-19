<table>
    <thead>
        <tr>
            <td>Reference Number</td>
            <td>Name</td>
            <td>Type of Loan</td>
            <td>Amount</td>
            <td>Due Date</td>
            <td>Balance</td>
            <td>Last Payment</td>
        </tr>
    </thead>
    <tbody>
    <tbody>

        @foreach($loans as $loan)
        <tr>
            <td>{{ $loan->refnum }}</td>
            <td>{{ $loan->employee->fullname2() }}</td>
            <td>{{ $loan->loantype->name }}</td>

            <td>{{ number_format($loan->amount,2,'.',',') }}</td>

            @if($loan->outstandingBalance()==0)

            <td colspan="3">Paid</td>

            @else
            <td>{{ $loan->latestPaymentSchedule()->paymentdate->format('Y-m-d') }}</td>
            <td>{{ number_format($loan->outstandingBalance(),2,'.',',') }}</td>
            <td>
                @if($loan->payments->count()>0)
                {{ number_format($loan->latestPayment()->amount,2,'.',',') }} - {{ $loan->latestPayment()->paymentdate }}
                @else 
                
                No Payment

                @endif
            
            </td>
            @endif
           
        </tr>
        @endforeach

    </tbody>
    
</table>