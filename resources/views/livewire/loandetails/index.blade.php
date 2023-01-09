<div class="p-12">

    @include('livewire.includes.messages')
    <div class="block pb-5">
        {!! $loan->employee->fullname() !!}

        <br>
        {{-- loan details  --}}

        @include('livewire.includes.loading')

        <div>
            
            
            <table class="text-sm">
                <thead>
                    <tr>
                        <th class="border bg-gray-400 px-3">Reference Number</th>
                        <th class="border bg-gray-400 px-3">Loan Amount</th>
                        <th class="border bg-gray-400 px-3">Loan Type</th>
                        <th class="border bg-gray-400 px-3">No. of Terms</th>
                        <th class="border bg-gray-400 px-3">Interest</th>
                        <th class="border bg-gray-400 px-3">Outstanding Balance</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center border px-3">{{ $loan->refnum }}</td>
                    <td class="text-center border px-3">Php {{ number_format($loan->amount, 2, '.', ',') }}</td>
                    <td class="text-center border px-3">{{ $loan->loantype->name }}</td>
                    <td class="text-center border px-3">{{ $loan->terminmonths }}</td>
                    <td class="text-center border px-3">{{ $loan->interest * 100 }}%</td>
                    <td class="text-center border px-3">Php {{ number_format(round($loan->outstandingBalance()),2,'.',',') }}</td>
                </tr>
            </tbody>
            </table>
            <hr>
        </div>

        {{-- buttons --}}
        <div class="hide">

            <a href="{{ route('member',['employee_id'=>$loan->employee->id]) }}"><button class="bg-blue-400 hover:bg-blue-600 rounded px-1 text-sm" >Back</button></a>
        
        @switch($loan->status)
                @case("Closed")
                
                @break

                @case("Approved")

                <button class="bg-green-400 hover:bg-green-600 rounded px-1 text-sm" wire:click="showAddPayment">Payment</button>
                <button class="bg-orange-400 hover:bg-orange-600 rounded px-1 text-sm" wire:click="openTerminateLoanConfirmation">Terminate</button>

                @break

                @case("Pending")

                <button class="bg-orange-400 hover:bg-orange-600 rounded px-1 text-sm" wire:click="openEditLoanModal({{ $this->loan->id }})">Edit</button>


                @if($loan->loantype->name=="Extended")
                <a href="{{ route('loanreleaseextended',['loan_id'=>$loan_id]) }}">
                    <button class="bg-green-400 hover:bg-green-600 rounded px-1 text-sm">Process</button>
                    </a>
                @else
                <a href="{{ route('loanrelease',['loan_id'=>$loan_id]) }}">
                <button class="bg-green-400 hover:bg-green-600 rounded px-1 text-sm">Process</button>
                </a>
                @endif

                {{-- <button class="bg-green-400 hover:bg-green-600 rounded px-1 text-sm" wire:click="openApproveLoanModal">Approved</button> --}}

                @break
        
            @default
                
        @endswitch

        </div>

        

    </div>

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
            </tr>
        </thead>
        <tbody>
            @php
                $count=1; 
            @endphp
            @foreach($paymentschedules as $paymentschedule)
            <tr>
                <td class="border p-1">{{ $count++ }}</td>
                <td class="border p-1">{{ $paymentschedule->paymentdate->format('F d, Y') }}</td>
                <td class="border p-1 text-right">Php {{ number_format($paymentschedule->balance,2,'.',',') }}</td>
                <td class="border p-1 text-right">Php {{ number_format($paymentschedule->principal,2,'.',',') }}</td>
                <td class="border p-1 text-right">Php {{ number_format($paymentschedule->interest,2,'.',',') }}</td>
                <td class="border p-1 text-right">Php {{ number_format($paymentschedule->monthlyamort,2,'.',',') }}</td>
                <td class="border p-1 text-right">

                    @if($paymentschedule->ispaid)
                    Paid
                    @endif
                   
            </tr>


            @endforeach

            <tr>
                <td class="border p-1" colspan="3">TOTAL </td>
                <td class="border p-1 text-right">Php {{ number_format(round($loan->paymentschedules->sum('principal')),2,'.',',') }}</td>
                <td class="border p-1 text-right">Php {{ number_format($loan->paymentschedules->sum('interest'),2,'.',',') }}</td>
                <td class="border p-1 text-right">Php {{ number_format(round($loan->paymentschedules->sum('monthlyamort')),2,'.',',') }}</td>
            </tr>

        </tbody>
    </table>


    <div>Payments</div>
    <div>
        <table class="text-xs">
            <thead>
                <tr>
                    <th class="border p-1">#</th>
                    <th class="border p-1">Date</th>
                    <th class="border p-1">Due Date</th>
                    <th class="border p-1">Amount</th>
                    <th class="border p-1">Principal</th>
                    <th class="border p-1">Interest</th>
                    <th class="border p-1">Tags</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count=1; 
                @endphp
                @foreach ($loan->payments as $payment )
                    <tr>
                        <td class="border p-1">{{ $count++ }}</td>
                        <td class="border p-1">{{ $payment->paymentdate }}</td>
                        <td class="border p-1">{{ $payment->paymentdue }}</td>
                        <td class="border p-1">{{ $payment->amount }}</td>
                        <td class="border p-1">{{ $payment->principal }}</td>
                        <td class="border p-1">{{ $payment->interest }}</td>
                        <td class="border p-1">{!! $payment->tags !!}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

        
@include('livewire.loandetails.modal.paymentmodal')


@include('livewire.loandetails.modal.terminate_loan')

@include('livewire.loandetails.modal.edit_employeeloan')

@include('livewire.loandetails.modal.approveconfirmation_modal')


</div>
