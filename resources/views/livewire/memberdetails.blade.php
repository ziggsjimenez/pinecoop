<div class="p-12">



    <div class="justify-center font-bold text-2xl">{{ $employee->fullname() }} </div>


    <div>
        <button @if($btnSelected=="Profile") class="bg-blue-800 rounded font-bold text-xl p-2" @else class="bg-blue-500 rounded font-bold text-xl p-2" @endif wire:click="selectButton(1)" rounded p-3>Profile</button>

        <button @if($btnSelected=="Accounts") class="bg-blue-800 rounded font-bold text-xl p-2" @else class="bg-blue-500 rounded font-bold text-xl p-2" @endif wire:click="selectButton(2)" rounded p-3>Accounts</button>
        
        <button @if($btnSelected=="Loans") class="bg-blue-800 rounded font-bold text-xl p-2" @else class="bg-blue-500 rounded font-bold text-xl p-2" @endif wire:click="selectButton(3)" rounded p-3>Loans</button>
    </div>

    <div class="border border-top">

        @if($btnSelected=="Profile")

        <h1 class="font-bold text-2xl justify-center">Profile</h1>
        <table>
            <tbody>
                <tr>
                    <td class="font-bold p-2">Name: </td>
                    <td class="font-bold pl-5 p-2">{{ $employee->fullname() }}</td>
                </tr>
            </tbody>
        </table>

        @endif

        @if($btnSelected=="Accounts")
        <h1 class="font-bold text-2xl justify-center">Accounts</h1> <i class="fa-solid fa-square-plus fa-2xl"></i> ADD
        @endif

        @if($btnSelected=="Loans")
        <h1 class="font-bold text-2xl justify-center">Loans</h1> <i class="fa-solid fa-square-plus fa-2xl"></i> ADD
        @endif

    </div>

</div>