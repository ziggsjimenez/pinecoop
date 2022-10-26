<table class="text-xs w-full">
    <thead>
        <tr>
            <th style="border-width: 1px;padding: 0.25rem;" class="border p-1">#</th>
            <th class="border p-1">Due Date</th>
            <th class="border p-1">Balance</th>
            <th class="border p-1">Principal</th>
            <th class="border p-1">Interest</th>
            <th class="border p-1">Monthly Amortization</th>
        </tr>
    </thead>
    <tbody>
        @php
            $count = 1;
            $totalprincipal = 0;
            $totalinterest = 0;
            $totalmonthlyamortization = 0;
            
            $monthly = $loan->amount / $loan->terminmonths;
            $balance = $loan->amount;
            $paymentdate = $loan->dateapproved;
            $displaypaidbtn = false;
            $arr_paymentsched = array();
        @endphp

        @for ($x = 0; $x < $loan->terminmonths; $x++)
            @php
                if ($x == 0) {
                    $noOfRemainingDays = date_diff($paymentdate, date_create($paymentdate->format('Y-m-t')))->format('%a');
                
                    $interestamount = (($balance * $loan->interest) / 30) * $noOfRemainingDays;
                    $monthlyamort = $interestamount + $monthly;
                } else {
                    $interestamount = $balance * $loan->interest;
                    $monthlyamort = $interestamount + $monthly;
                }
                
                array_push($arr_paymentsched, [
                    'paymentdate' => $paymentdate->format('Y-m-t'),
                    'principal' => $monthly,
                    'interestamount' => $interestamount,
                    'monthlyamort' => $monthlyamort,
                    'balance' => $balance,
                ]);
            @endphp
            <tr>
                <td class="border p-1 py-0">{{ $count++ }}</td>
                <td class="border p-1 py-0">{{ $paymentdate->format('m-t-Y') }}</td>
                <td class="border p-1 py-0 text-right">Php {{ number_format($balance, 2, '.', ',') }}
                </td>
                <td class="border p-1 py-0 text-right">Php {{ number_format($monthly, 2, '.', ',') }}
                </td>
                <td class="border p-1 py-0 text-right">Php
                    {{ number_format($interestamount, 2, '.', ',') }}
                </td>
                <td class="border p-1 py-0 text-right">Php
                    {{ number_format($monthlyamort, 2, '.', ',') }}
                </td>
            </tr>
            @php
                date_add($paymentdate, date_interval_create_from_date_string('+1 month'));
                $balance -= $monthly;
                
                $totalprincipal += $monthly;
                $totalinterest += $interestamount;
                $totalmonthlyamortization += $monthlyamort;
            @endphp
        @endfor
        <tr>
            <td class="border p-1"></td>
            <td class="border p-1"></td>
            <td class="border p-1"></td>
            <td class="border p-1 text-right font-bold">Php
                {{ number_format($totalprincipal, 2, '.', ',') }}
            </td>
            <td class="border p-1 text-right font-bold">Php
                {{ number_format($totalinterest, 2, '.', ',') }}
            </td>
            <td class="border p-1 text-right font-bold">Php
                {{ number_format($totalmonthlyamortization, 2, '.', ',') }}
            </td>
        </tr>
    </tbody>
</table>