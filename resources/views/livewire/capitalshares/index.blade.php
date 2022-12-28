<div class="p-12">

    <div class="block mb-5">
        <span class="font-bold text-xl">Capital Shares</span> <button class="rounded font-bold ml-5 text-xs text-white px-2 p-1 bg-teal-300 hover:bg-teal-600" wire:click="export">Export to Excel</button>
    </div>

    @include('livewire.includes.loading')

   
      

        <div class="block">

            <table class="text-xs">
                <thead>
                <tr>
                    <th class="border p-1">#</th>
                    <th class="border p-1">Name</th>
                    <th class="border p-1">Forwarded Balance</th>
                    @for ( $x=1 ; $x < 13 ; $x++)

                        <th class="border p-1">{{ date("M 'y", strtotime(date('Y').'-'.$x.'-01')) }}</th>

                    @endfor
                    <th class="border p-1">Share Capital</th>
                    <th class="border p-1">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count=1;
                @endphp
                @foreach ($employees as $employee )
                    <tr>
                        <td class="border p-1">{{ $count++ }}</td>
                        <td class="border p-1">{{ $employee->fullname2() }}</td>
                        <td class="border p-1 text-right">{{ number_format($employee->capitalShareBeginningBalance(),2,'.',',') }}</td>

                        @for ( $x=1 ; $x < 13 ; $x++)

                        <td class="border p-1 text-right">{{ number_format($employee->getAmountYearMonth(date('Y'),$x),2,'.',',') }}</td>

                        @endfor

                        <td class="border p-1 text-right">Php {{ number_format($employee->capitalShare->transactions->sum('amount'),2,'.',',')}}</td>
                        <td class="border p-1">
                            <a href="{{ route('account',['account_id'=>$employee->capitalShare->id]) }}">
                            <button class="rounded px-3 py-1 bg-green-300 hover:bg-green-500 text-white font-bold"> View </button>
                        </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>

        </div>
                    
    
</div>