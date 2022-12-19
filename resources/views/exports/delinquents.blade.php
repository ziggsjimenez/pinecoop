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
            <td>Days from Last Payment</td>
        </tr>
    </thead>
    <tbody>
        @foreach($loans as $loan)
        <tr>
            <td>{{ $loan->refnum }}</td>
            <td>{{ $loan->employee->fullname2() }}</td>
            <td>{{ $loan->loantype->name}}</td>
            <td>{{ number_format($loan->amount,2,'.',',') }}</td>
            <td>
                @if($loan->latestPaymentSchedule()!=null){{ $loan->latestPaymentSchedule()->paymentdate->format('Y-m-d') }}@endif
            </td>
            <td>{{ number_format($loan->outstandingBalance(),2,'.',',') }}</td>
            <td>@if($loan->latestPayment()!=null){{ $loan->latestPayment()->paymentdate }}@endif</td>
            <td>{{ $loan->aging() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>