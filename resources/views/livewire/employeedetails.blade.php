<div class="p-12">
  


    <div class="justify-center font-bold text-2xl">{{ $employee->fullname() }}</div>


    <div class="flex flex-row">
        <div class="w-full bg-teal-200 m-5 p-5 rounded rounded-pill">
        
            <h1 class="font-bold text-2xl justify-center">Profile</h1>
            <table>
                <tbody>
                    <tr>
                        <td class="font-bold p-2">Name: </td><td class="font-bold pl-5 p-2">{{ $employee->fullname() }}</td>
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
