<table>
    <thead>
        <tr>
            <th class="border p-1">Id</th>
            <th class="border p-1">Ref #</th>
            <th class="border p-1">Amount</th>
            <th class="border p-1">Date of Transaction</th>
            
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
            <td class="border p-1 text-right">Php {{ number_format($transaction->amount,2,'.',',')}}</td>
            <td class="border p-1 text-center">{{ $transaction->dateoftransaction->format('F d, Y')}}</td>
           
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('printAccount',['account_id'=>$account->id]) }}"> <button class="bg-blue-400 rounded px-3 font-bold text-sm">Print</button></a>   