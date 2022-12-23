<div class="p-12 flex justify-center">



    <div
        class="mx-2 w-1/3 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
        </a>
        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Overdue Accounts
                </h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                <table class="text-xs w-full">
                    <thead>
                        <tr><th class="border p-1">Ref Num</th><th class="border p-1">Name</th><th class="border p-1">Days from Last Payment</th><th class="border p-1">Action</th></tr>
                    </thead>
                    <tbody>
                        @foreach ($loans as $loan )

                        @if($loan->aging()>30)

                        <tr>
                            <td class="border p-1">{{ $loan->refnum }}</td>
                            <td class="border p-1">{{ $loan->employee->fullname2() }}</td>
                            <td class="border p-1">{{ $loan->aging() }}</td>
                            <td class="border p-1"><a href="{{ route('loan',['loan_id'=>$loan->id]) }}"><button class="rounded p-1 px-3 text-xs font-bold bg-orange-300">View</button></a></td>
                        </tr>

                        @endif
                            
                        @endforeach
                    </tbody>
                </table>
                
            </p>
            
        </div>
    </div>

    <div
        class="mx-2 w-1/3 bg-white rounded-lg border border-gray-200 ">
        <a href="#">
            <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
        </a>
        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Birthdays</h5>
            </a>
            <p class="mb-3 font-normal">For the month of <b>{{  date('F')  }} </b></p>

            <table class="w-full pb-15 mt-2">
                <col width="50%">
                <col width="50%">
                <thead>
                    <tr>
                        <th class="border p-1">Name</th>
                        <th class="border p-1">Birth Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($birthdays as $row)
                        <tr>
                            <td class="border p-1">{{ strtoupper($row->lastname.', '.$row->firstname. ' '.$row->middlename. ' '.$row->extension)  }}</td>
                            <td class="border p-1">{{ date_format(date_create($row->birthdate),'F j, Y')  }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div
        class="mx-2 w-1/3 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
        </a>
        <div class="p-5">
            <a href="{{ route('employees') }}">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Employees</h5>
            </a>

            <table class="w-full">
                <tr>
                    <td>Member</td><td>{{ $membercount }}</td>
                    <td>Non-Member</td><td>{{ $nonmembercount }}</td>
                </tr>
            </table>
            
        </div>
    </div>


</div>