<div class="p-12">
    <div class="justify-center font-bold text-2xl">{{ $employee->fullname() }}</div>
    <div class="flex flex-row">

        <div class="w-full bg-teal-200 m-5 p-5 rounded rounded-pill">
            <h1 class="font-bold text-2xl justify-center">Profile</h1>
            <table>
                <tbody>
                    <tr>
                        <td class="font-bold p-2">Name: </td>
                        <td class="font-bold pl-5 p-2">{{ $employee->fullname() }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="w-full bg-indigo-200 m-5 p-5 rounded rounded-pill">
            <h1 class="font-bold text-2xl justify-center">Accounts</h1>
        </div>
        <div class="w-full bg-blue-200 m-5 p-5 rounded rounded-pill">
            <h1 class="font-bold text-2xl justify-center">Loans</h1>
        </div>
    </div>
</div>



<div class="flex justify-center">
    <div class="block p-6 rounded-lg shadow-lg bg-white w-full" style="margin: 2rem 2rem;">
        <ul class="flex flex-row  md:space-x-10  list-none border-b-0 pl-0 mb-4" id="tabs-tab3" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="#tabs-profile" class="rounded-t-lg bg-indigo-500 px-6 py-2 text-white" id="tab-emp-profile" data-bs-toggle="pill" data-bs-target="#tabs-profile" role="tab" aria-controls="tabs-profile" aria-selected="true">Profile</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="#tabs-account" class="rounded-t-lg px-6 py-2" id="tab-emp-account" data-bs-toggle="pill" data-bs-target="#tabs-account" role="tab" aria-controls="tabs-account" aria-selected="false">Account</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="#tabs-loan" class="rounded-t-lg px-6 py-2" id="tab-emp-loan" data-bs-toggle="pill" data-bs-target="#tabs-loan" role="tab" aria-controls="tabs-loan" aria-selected="false">Loan</a>
            </li>
        </ul>
        <div>

            <div class="tab-content" id="tabs-tabContent3">
                <div class="tab-pane fade show active" id="tabs-profile" role="tabpanel" aria-labelledby="tab-emp-profile">
                    Tab PROFILE content button version
                </div>
                <div class="tab-pane fade" id="tabs-account" role="tabpanel" aria-labelledby="tab-emp-account">
                    Tab ACCOUNT content button version
                </div>
                <div class="tab-pane fade" id="tabs-loan" role="tabpanel" aria-labelledby="tab-emp-account">
                    Tab LOAN content button version
                </div>
            </div>

            <!-- BODY -->
        </div>
    </div>
</div>