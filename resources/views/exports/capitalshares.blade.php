<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Forwarded Balance</th>
        @for ( $x=1 ; $x < 13 ; $x++)

            <th>{{ date("M", strtotime('00-'.$x.'-01')) }} ' {{ date('y') }}</th>

        @endfor
        <th>Share Capital</th>

    </tr>

</thead>
<tbody>
    @php
        $count=1;
    @endphp
    @foreach ($employees as $employee )
        <tr>
            <td>{{ $count++ }}</td>
            <td>{{ $employee->fullname2() }}</td>
            <td>{{ number_format($employee->capitalShareBeginningBalance(),2,'.',',') }}</td>

            @for ( $x=1 ; $x < 13 ; $x++)

            <td>{{ number_format($employee->getAmountYearMonth(date('Y'),$x),2,'.',',') }}</td>

            @endfor

            <td>{{ number_format($employee->capitalShare->transactions->sum('amount'),2,'.',',')}}</td>

        </tr>
    @endforeach
</tbody>
</table>