<div class="p-12">

    <div class="block mb-5">
        <span class="font-bold text-xl">Capital Shares</span> <button class="rounded font-bold ml-5 text-xs text-white px-2 p-1 bg-teal-300 hover:bg-teal-600">Export to Excel</button>
    </div>

   
      

        <div class="block">

            <table class="text-xs">
                <thead>
                <tr>
                    <th class="border p-1">#</th>
                    <th class="border p-1">Name</th>
                    <th class="border p-1">Share Capital</th>
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
                        <td class="border p-1 text-right">Php {{ number_format($employee->capitalShare->transactions->sum('amount'),2,'.',',')}}</td>
                    </tr>
                @endforeach
            </tbody>
            </table>

        </div>
                    
    
</div>