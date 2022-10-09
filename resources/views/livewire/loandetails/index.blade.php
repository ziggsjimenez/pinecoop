<div class="p-12">

    @include('livewire.includes.messages')
    <div class="block pb-5">
        {!! $loan->employee->fullname() !!}

        <br>
        {{-- loan details  --}}

        <div>
            Loan Amount: Php {{ number_format($loan->amount,2,'.',',') }} <br>
            Loan Type: {{ $loan->loantype->name }} <br>
            No. of Terms: {{ $loan->terminmonths }} <br>
            Interest: {{ $loan->interest*100 }}%<br>
        </div>
        <a href="{{ route('member',['employee_id'=>$loan->employee->id]) }}">
            <x-jet-button class="bg-gray-400"><i class="fa-solid fa-circle-left fa-2x"></i> Back </x-jet-button>
        </a>
        @IF ($loan->isapproved == false)
        <x-jet-button class="bg-orange-400" wire:click="showEditEmployeeLoanModal"><i class="fa-solid fa-pen-to-square fa-2x"></i> Edit</x-jet-button>
        <x-jet-button class="bg-blue-400" wire:click="showApproveConfirmationModal"><i class="fa-solid fa-thumbs-up fa-2x"></i>Approve</x-jet-button>
        @ENDIF
    </div>


    {{-- payment schedule --}}

    <x-jet-button wire:click="generateSchedule"> GENERATE PAYMENT SCHEDULE </x-jet-button>


    <div>
        <table class="text-xs">
            <thead>
                <tr>
                    <th class="border p-1">#</th>
                    <th class="border p-1">Payment Date</th>
                    <th class="border p-1">Balance</th>
                    <th class="border p-1">Principal</th>
                    <th class="border p-1">Interest</th>
                    <th class="border p-1">Monthly Amortization</th>
                    <th class="border p-1">Status</th>
                    <th class="border p-1">Action</th>

                </tr>
            </thead>
            <tbody>
                @php

                $count = 1;
                $totalprincipal = 0;
                $totalinterest = 0;
                $totalmonthlyamortization = 0;

                $monthly = $this->loan->amount / $this->loan->terminmonths;
                $balance = $this->loan->amount;
                $paymentdate = $this->loan->dateapproved;
                $displaypaidbtn = false;
                @endphp

                @for($x = 0; $x < $this->loan->terminmonths; $x++)
                    @php

                    $interestamount = $balance * $this->loan->interest;
                    $monthlyamort = $interestamount + $monthly;

                    $chck = $this->checkpaymentdata($paymentdate->format('Y-m-d'),number_format($monthly ,2,'.',''),number_format($interestamount ,2,'.',''),number_format($monthlyamort ,2,'.',''),number_format($balance ,2,'.',''));
                    @endphp
                    <tr>
                        <td class="border p-1">{{ $count++ }}</td>
                        <td class="border p-1">{{ $paymentdate->format('F d, Y') }}</td>
                        <td class="border p-1 text-right">Php {{ number_format($balance ,2,'.',',') }}</td>
                        <td class="border p-1 text-right">Php {{ number_format($monthly ,2,'.',',') }}</td>
                        <td class="border p-1 text-right">Php {{ number_format($interestamount ,2,'.',',') }}</td>
                        <td class="border p-1 text-right">Php {{ number_format($monthlyamort ,2,'.',',') }}</td>

                        <td class="border p-1 text-center">
                            @if($chck > 0)
                            <span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-green-500 text-white rounded">Paid</span>
                            @else
                                @if(date('Y-m-d') > $paymentdate)
                                <span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-yellow-500 text-white rounded">Overdue</span>
                                @else
                                <span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-red-600 text-white rounded">Unpaid</span>
                                @endif
                            @endif
                        </td>
                        <td class="border p-1 text-right">
                            @if($chck == 0 && !$displaypaidbtn)
                            <x-jet-button class="bg-indigo-700 px-4 py-1" style="text-transform:none" wire:click="showPaidPaymentConfirmation({{$x}})">Paid</x-jet-button>
                            <x-jet-button class="bg-indigo-700 px-4 py-1" style="text-transform:none" wire:click="showCashPaymentConfirmation({{$x}})">Cash Payment</x-jet-button>

                            @php
                            $displaypaidbtn = true;
                            @endphp

                            @endif
                        </td>
                    </tr>
                    @php

                    date_add($paymentdate, date_interval_create_from_date_string("+1 month"));
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
                    <td class="border p-1 text-right font-bold">Php {{ number_format($totalprincipal,2,'.',',') }}</td>
                    <td class="border p-1 text-right font-bold">Php {{ number_format($totalinterest,2,'.',',') }}</td>
                    <td class="border p-1 text-right fontbold">Php {{ number_format($totalmonthlyamortization,2,'.',',') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @include('livewire.loandetails.modal.edit_employeeloan')
    @include('livewire.loandetails.modal.approveconfirmation_modal')
    @include('livewire.loandetails.modal.paid_confirmation_modal')
    @include('livewire.loandetails.modal.cashpayment_modal')
</div>