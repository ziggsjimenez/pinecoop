<table>
    <thead>
        <tr>
            <th class="border p-1">Id</th>
            <th class="border p-1">Ref #</th>
            <th class="border p-1">Amount</th>
            <th class="border p-1">Date of Transaction</th>
            <th class="border p-1">User</th>
        </tr>
    </thead>

    @php
        
        $count = 1; 
    @endphp

    <tbody>
        @foreach($account->transactions as $transaction)

        <tr>
            <td class="border p-1">{{ $count++ }}</td>
            <td class="border p-1">{{ $transaction->transaction_reference_number }}</td>
            <td class="border p-1">{{ number_format($transaction->amount,2,'.',',')}}</td>
            <td class="border p-1">{{ $transaction->dateoftransaction->format('F d, Y')}}</td>
            <td class="border p-1">{{ $transaction->user->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>