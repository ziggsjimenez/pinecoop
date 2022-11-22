<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SOA</title>
    <style>

table {
  border-collapse: collapse;
  border: 1px solid;
}

td,th {
    font-size: 12px;
}

        .border {
            border: 1px solid;
        }
        .p-1{
            padding: 0.25rem;
        }
        .py-0{
            padding-top: 0px;
            padding-bottom: 0px;
        }
        .text-right{
            text-align: right;
        }
        .font-bold{
            font-weight: 700;
        }
    </style>

</head>
<body>

    <div>

        PINECOOP<br>
        Camp Phillips, Agusan Canyon,<br>
        Manolo Fortich, Bukidnon<br>
        <br>
        <br>


        Name:  {{ $loan->employee->fullname2() }}             <br>
        Address: {{ $loan->employee->praddress() }} <br>
        Loan Product:{{ $loan->loantype->name }}<br>
        Net Proceeds:{{ $loan->amount }}<br>
        Date Released: {{ $loan->dateapproved->format('F d, Y') }}<br>
        Applied Amount:Php {{ number_format($loan->amount,2,'.',',') }}<br>
        Payment Terms: {{ $loan->terminmonths }} months <br>

        {{-- @include('pdf.tables.paymentschedule') --}}
    

        <table style="padding-top: 10px;">
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


        <br><br><br>

        Prepared by: <br><br><br>

        {{ Auth::user()->name  }} <br>
        
        <br><br><br>

        Approved: <br><br><br>


        JUNEL JIG G. JIMENEZ <br>
        PINECOOP Manager 

        <br><br><br>

        Conforme: <br><br><br>


        {{ $loan->employee->fullname2() }} <br>
        


    </div>
    
</body>
</html>
