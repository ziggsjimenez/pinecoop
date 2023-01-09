<div class="p-12">

    @include('livewire.includes.messages')

    <div class="font-bold text-2xl">
        LOAN RELEASE
    </div>

    {{-- @include('livewire.includes.loading') --}}



    <div class="grid grid-cols-2 gap-4">
        <div>
            <div class="block pb-5">
                {!! $loan->employee->fullname() !!}
        
                <br>
                {{-- loan details  --}}
        
                <div class="my-5">
                    
                    
                    <table class="text-sm">
                        <thead>
                            <tr>
                                <th class="border bg-gray-400 px-3">Reference Number</th>
                                <th class="border bg-gray-400 px-3">Loan Amount</th>
                                <th class="border bg-gray-400 px-3">Loan Type</th>
                                <th class="border bg-gray-400 px-3">No. of Terms</th>
                                <th class="border bg-gray-400 px-3">Interest</th>
        
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center border px-3">{{ $loan->refnum }}</td>
                            <td class="text-center border px-3">Php {{ number_format($loan->amount, 2, '.', ',') }}</td>
                            <td class="text-center border px-3">{{ $loan->loantype->name }}</td>
                            <td class="text-center border px-3">{{ $loan->terminmonths }}</td>
                            <td class="text-center border px-3">{{ $loan->interest * 100 }}%</td>
        
                        </tr>
                    </tbody>
                    </table>
                    <hr>
                </div>
        
                {{-- buttons --}}
                <div class="hide">
        
                    <a href="{{ route('loan',['loan_id'=>$loan->id]) }}"><button class="bg-blue-400 hover:bg-blue-600 rounded px-1 text-sm" >Back</button></a>
            
                   
        
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
                    @foreach($loan->paymentschedules as $paymentschedule)
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
        
        
            <div>
                <table class="text-sm">
                    <tr class="font-bold">
                        <td>Loan Amount:</td><td class="text-right">Php {{ number_format($loan->amount,2,'.',',') }}</td>
                    </tr>
                    <tr>
                        <td>LESS: </td>
                    </tr>
                    <tr>
                        <td>Processing Fee: </td><td class="text-right">Php {{ number_format($loan->processingfee(),2,'.',',') }}</td>
                    </tr>
                    <tr>
                        <td>Insurance</td><td class="text-right">Php {{ number_format($loan->insurance(),2,'.',',') }}</td>
                    </tr>
                    <tr class="font-bold">
                        <td>NET Amount</td> <td class="text-right">Php {{ number_format($loan->netamount(),2,'.',',') }}</td>
                    </tr>
                </table>
            </div>


            <div class="block">

                Gurantor/s: <br>

                @foreach($loan->guarantors as $guarantor)

                {{ $guarantor->employee->fullname2() }} <x-jet-button wire:click="removeGuarantor({{ $guarantor->id }})" class="bg-red-300">Del</x-jet-button>

                @endforeach

            </div>
        

            @if($loan->guarantors->count()>0)
            <div class="hide">
                <button class="bg-green-400 hover:bg-green-600 rounded px-1 text-sm" wire:click="openApproveLoanModal">Approved</button>
            </div>
            @endif

        </div>
        <!-- guarantor -->

        
        <div>
            
            <button class="bg-green-400 hover:bg-green-600 rounded px-1 text-sm" wire:click="addGuarantor">Add Guarantor</button>


            @if($showGuarantor)

            <div class="block mt-5">

            <input type="text" wire:model.defer="searchToken" placeholder="Type lastname of gurantor here...">
            <x-jet-button wire:click="loadRegularMembers">Submit</x-jet-button>

            <div wire:loading wire:target="loadRegularMembers">
                Processing...
            </div>

            <hr>

            <div class="block w-full">

                @if($regularmembers!=null)
                <table class="text-sm">
                    <thead>
                        <tr>
                            <th class="border p-1">#</th>
                            <th class="border p-1">Name</th>
                            <th class="border p-1">Total Active Loans</th>
                            <th class="border p-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count=1;
                        @endphp
                        @foreach($regularmembers as $regmem)
                        <tr>
                            <td class="border p-1">{{ $count++ }}</td>
                            <td class="border p-1">{{ $regmem->fullname2() }}</td>
                            <td class="border p-1 text-right">{{ number_format($regmem->activeLoans()->sum('amount'),2,'.',',') }}</td>
                            <td class="border p-1">
                                <x-jet-button wire:click="saveGuarantor({{ $regmem->id }})">Add</x-jet-button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif

            </div>

            </div>

            @endif



        </div>


      </div>

@include('livewire.loandetails.modal.approveconfirmation_modal')


</div>
