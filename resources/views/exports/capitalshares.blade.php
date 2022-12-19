<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
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
            <td>{{ number_format($employee->capitalShare->transactions->sum('amount'),2,'.',',')}}</td>
        </tr>
    @endforeach
</tbody>
</table>