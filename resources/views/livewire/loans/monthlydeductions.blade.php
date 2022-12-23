<div class="p-12">
    
    <div class="block">

        <select wire:model="year">
            <option value="">Select year...</option>
            @php    
                $tempyear=2022;
            @endphp
            @for ($x = 0; $x < 10; $x++)
                <option value="{{ $tempyear-$x }}">{{ $tempyear-$x }}</option>
            @endfor
            
        </select>

        <select wire:model="month">
            <option value="">Select month...</option>
            <option value="1">January</option>
            <option value="2">Febuary</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>

        <button class="rounded p-1 text-sm font-bold bg-green-400 hover:bg-green-600 text-white" wire:click="show">Submit</button>

        <span wire:loading><i class="fa-solid fa-spinner fa-spin"></i> Processing...</span>

        <table class="text-xs w-full">
            <thead>
                <tr>
                    <th class="border p-1">#</th>
                    <th class="border p-1">Loan Ref</th>
                    <th class="border p-1">Name</th>
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

                @if($paymentschedules!=NULL)
                @foreach($paymentschedules as $paymentschedule)
                <tr>
                    <td class="border p-1">{{ $count++ }}</td>
                    <td class="border p-1 font-bold text-blue underline">
                        <a href="{{ route('loan',['loan_id'=>$paymentschedule->loan->id]) }}">
                        {{ $paymentschedule->loan->refnum }}
                    </a>
                    </td>
                    <td class="border p-1">{{ $paymentschedule->loan->employee->fullname2() }}</td>
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
                    <td class="border p-1 text-right">Php {{ number_format(round($paymentschedules->sum('principal')),2,'.',',') }}</td>
                    <td class="border p-1 text-right">Php {{ number_format($paymentschedules->sum('interest'),2,'.',',') }}</td>
                    <td class="border p-1 text-right">Php {{ number_format(round($paymentschedules->sum('monthlyamort')),2,'.',',') }}</td>
                </tr>
                @endif
    
            </tbody>
        </table>





    </div>


</div>
