<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Loan Ref</th>
            <th>Name</th>
            <th>Due Date</th>
            <th>Balance</th>
            <th>Principal</th>
            <th>Interest</th>
            <th>Monthly Amortization</th>

        </tr>
    </thead>
    <tbody>
        @php
            $count=1; 
        @endphp

        @if($paymentschedules!=NULL)
        @foreach($paymentschedules as $paymentschedule)
        <tr>
            <td>{{ $count++ }}</td>
            <td>
                
                {{ $paymentschedule->loan->refnum }}
            
            </td>
            <td>{{ $paymentschedule->loan->employee->fullname2() }}</td>
            <td>{{ $paymentschedule->paymentdate->format('F d, Y') }}</td>
            <td>Php {{ number_format($paymentschedule->balance,2,'.',',') }}</td>
            <td>Php {{ number_format($paymentschedule->principal,2,'.',',') }}</td>
            <td>Php {{ number_format($paymentschedule->interest,2,'.',',') }}</td>
            <td>Php {{ number_format($paymentschedule->monthlyamort,2,'.',',') }}</td>
               
        </tr>


        @endforeach

        @endif

    </tbody>
</table>