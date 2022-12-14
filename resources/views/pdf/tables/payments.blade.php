<div class="p-12">


    <div class="block pb-5">
        {!! $loan->employee->fullname2() !!}

        <br>
        {{-- loan details  --}}

        <div>
            Loan Amount: Php {{ number_format($loan->amount, 2, '.', ',') }} <br>
            Loan Type: {{ $loan->loantype->name }} <br>
            No. of Terms: {{ $loan->terminmonths }} <br>
            Interest: {{ $loan->interest * 100 }}%<br>
            No. of years: {{ $loan->employee->monthsInService() }}<br>
        </div>
        <a href="{{ route('member', ['employee_id' => $loan->employee->id]) }}">
            <x-jet-button class="bg-gray-400"><i class="fa-solid fa-circle-left fa-2x"></i> Back </x-jet-button>
        </a>
        @if ($loan->isapproved == false)
            <x-jet-button class="bg-orange-400" wire:click="showEditEmployeeLoanModal"><i
                    class="fa-solid fa-pen-to-square fa-2x"></i> Edit</x-jet-button>
            <x-jet-button class="bg-blue-400" wire:click="showApproveConfirmationModal"><i
                    class="fa-solid fa-thumbs-up fa-2x"></i>Approve</x-jet-button>
        @endif
    </div>

    <div class="block font-bold text-xl">Payment Schedule</div> 

    <button class="bg-blue-300 hover:bg-blue-500 rounded px-1 mt-3">
        <a target="_blank" href="{{ route('printPaymentSchedule',['loan_id'=>$loan->id]) }}">  <i class="fa-solid fa-print"></i> Print </a>
     </button>

    {{-- payment schedule --}}
    <div>
        <div class="flex flex-wrap mx-0 mb-2">
            <div class="w-full px-0 mb-2 md:mb-4">
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
                            $count = 1;
                            $totalprincipal = 0;
                            $totalinterest = 0;
                            $totalmonthlyamortization = 0;
                            
                            $monthly = $loan->amount / $loan->terminmonths;
                            $balance = $loan->amount;
                            $paymentdate = $loan->dateapproved;
                            $displaypaidbtn = false;
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

            


            </div>


            {{-- THIS WILL BE AVAILBE IF APPROVED --}}
            @if ($loan->isapproved == true)
                <div class="w-full px-0 mb-2 md:mb-1">


                    <div class="block font-bold text-xl">Payments</div> 

                    <button class="bg-blue-300 hover:bg-blue-500 rounded px-1 mt-3">
                        <a target="_blank" href="{{ route('printpayments',['loan_id'=>$loan->id]) }}">  <i class="fa-solid fa-print"></i> Print </a>
                     </button>


                    <table class="text-xs w-full">
                        <thead>
                            <tr>
                                <th class="border p-1">#</th>
                                <th class="border p-1">Due Date</th>
                                <th class="border p-1">Balance</th>
                                <th class="border p-1">Principal</th>
                                <th class="border p-1">Interest</th>
                                <th class="border p-1">Monthly Amortization</th>
                                <th class="border p-1">Status</th>
                                <th class="border p-1">Date Paid</th>
                                <th class="border p-1">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $displaypaidbtn = false;
                                $index = 0;
                                $count = 1;
                                $totalprincipal = 0;
                                $totalinterest = 0;
                                $totalmonthlyamortization = 0;
                            @endphp


                            @for ($i = 0; $i < count($arr_paymentsched); $i++)
                                @php
                                    $chck = $loan->checkpaymentdata(date_format(date_create($arr_paymentsched[$i]['paymentdate']), 'Y-m-d'), number_format($arr_paymentsched[$i]['principal'], 2, '.', ''), number_format($arr_paymentsched[$i]['interestamount'], 2, '.', ''), number_format($arr_paymentsched[$i]['monthlyamort'], 2, '.', ''), number_format($arr_paymentsched[$i]['balance'], 2, '.', ''));
                                @endphp
                                {{-- CHECK IF NAG OVERDUE/NILAPAS NABA SA CURRENT NGA DATE --}} {{-- IF WALA NAG BAYAD --}}
                                @if (date('Y-m-d') > $arr_paymentsched[$i]['paymentdate'] && $chck->count() == 0)
                                    @php
                                        if (isset($arr_paymentsched[$i + 1])) {
                                            $arr_paymentsched[$i + 1]['balance'] = $arr_paymentsched[$i]['balance'] + $arr_paymentsched[$i]['monthlyamort']; // nextmonth balance = curr balance + curr monthly amortization
                                            $arr_paymentsched[$i + 1]['principal'] = $arr_paymentsched[$i]['monthlyamort'] + $arr_paymentsched[$i + 1]['principal']; // current month + sa nextmonth
                                            $arr_paymentsched[$i + 1]['interestamount'] = $arr_paymentsched[$i + 1]['balance'] * $loan->interest; // nextmonth interest = nextmonth balance * interest rate
                                            $arr_paymentsched[$i + 1]['monthlyamort'] = $arr_paymentsched[$i + 1]['principal'] + $arr_paymentsched[$i + 1]['interestamount']; // nextmonth amortization = nextmonth principal (monthly)  + nextmonth nga interest
                                        }

                                        if($i+1 == count($arr_paymentsched)){
                                            $displaypaidbtn = false;
                                        }
                                    @endphp
                                @endif
                                <tr>
                                    <td class="border p-1 py-0">{{ $count++ }}</td>
                                    <td class="border p-1 py-0">
                                        {{ date_format(date_create($arr_paymentsched[$i]['paymentdate']), ' m-d-Y') }}
                                    </td>
                                    <td class="border p-1 py-0 text-right">Php
                                        {{ number_format($arr_paymentsched[$i]['balance'], 2, '.', ',') }}
                                    </td>
                                    <td class="border p-1 py-0 text-right">Php
                                        {{ number_format($arr_paymentsched[$i]['principal'], 2, '.', ',') }}
                                    </td>
                                    <td class="border p-1 py-0 text-right">Php
                                        {{ number_format($arr_paymentsched[$i]['interestamount'], 2, '.', ',') }}
                                    </td>
                                    <td class="border p-1 py-0 text-right">Php
                                        {{ number_format($arr_paymentsched[$i]['monthlyamort'], 2, '.', ',') }}
                                    </td>
                                    <td class="border p-1 py-0 text-center">
                                        @if ($chck->count() == 1)
                                            <span
                                                class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-green-500 text-white rounded">Paid</span>
                                        @elseif(date('Y-m-d') > $arr_paymentsched[$i]['paymentdate'] && $chck->count() == 0)
                                            <span
                                                class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-red-600 text-white rounded">Unpaid</span>
                                        @endif
                                    </td>
                                    <td class="border p-1 py-0 text-right">
                                        {{ $chck->get()->pluck('created_at')->first() != ''? date_format(date_create($chck->get()->pluck('created_at')->first()),'m-d-Y h:i A'): '' }}
                                    </td>
                                    <td class="border p-1 text-center">
                                        @if ($chck->count() == 0 && (date('Y-m-d') <= $arr_paymentsched[$i]['paymentdate'] || ($i+1 == count($arr_paymentsched))) && !$displaypaidbtn)
                                            <x-jet-button class="bg-indigo-700 px-4 py-1" style="text-transform:none"
                                                wire:click="showPaidPaymentConfirmation({{ $i }})"><i class="fa-solid fa-check mr-2"></i> Paid
                                            </x-jet-button>
                                            <x-jet-button class="bg-indigo-700 px-5 py-1" style="text-transform:none"
                                                wire:click="showCashPaymentConfirmation({{ $i }})">
                                                
                                                <i class="fa-solid fa-peso-sign mr-2"></i>Cash
                                                Payment</x-jet-button>
                                            @php
                                                $displaypaidbtn = true;
                                            @endphp
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $totalprincipal += $arr_paymentsched[$i]['principal'];
                                    $totalinterest += $arr_paymentsched[$i]['interestamount'];
                                    $totalmonthlyamortization += $arr_paymentsched[$i]['monthlyamort'];
                                    $index++;
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
                </div>
            @endif
        </div>

    </div>

</div>
