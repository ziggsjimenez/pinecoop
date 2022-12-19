<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Birthday</th>
            <th>Sex</th>
            <th>P. R. Address</th>
            <th>Employement Date</th>
            <th>Membership Span</th>
            
        </tr>
    </thead>
    <tbody>
        @php
            $count = 1;
        @endphp
        @foreach ($employees as $employee)
            @php
                $datetime1 = new DateTime($employee->dateofmembership);
                $datetime2 = new DateTime(date('Y-m-d h:i:s'));
                
                $interval = $datetime1->diff($datetime2);
                $diffInDays = $interval->d != 0 ? ($interval->d > 1 ? $interval->d . ' Days' : $interval->d . ' Day') : '';
                $diffInMonths = $interval->m != 0 ? ($interval->m > 1 ? $interval->m . ' Months' : $interval->m . ' Month') : '';
                $diffInYears = $interval->y != 0 ? ($interval->y > 1 ? $interval->y . ' Years' : $interval->y . ' Year') : '';
            @endphp
            <tr>
                <td>{{ $count++ }}</td>
                <td>{!! $employee->fullname() !!} </td>
                <td>{{ $employee->birthdate->format('F d, Y') }}
                </td>
                <td>{{ $employee->sex }} </td>
                <td>{{ $employee->praddress() }} </td>
                <td>
                    {{ $employee->dateofmembership->format('F d, Y') }} 
                
                    @if(!$employee->ispinecoopmem) <button class="bg-orange-400 rounded text-xs px-3">Non-Member</button>@endif
                     
                </td>
                <td>
                    {{ $diffInYears . ' ' . $diffInMonths . ' ' . $diffInDays }}
                </td>
                
            </tr>
        @endforeach

    </tbody>
</table>