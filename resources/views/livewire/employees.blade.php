<div class="p-12">

    <div class="block bg-green-100 p-10">

        <div class="mb-5">
            <span class="uppercase tracking-wide text-gray-700 text-xl font-bold mb-2">EMPLOYEES</span>
            <x-jet-button wire:click="showAddModal" class="pl-5">ADD</x-jet-button>
        </div>
        <br>

        <input wire:model="searchToken"
            class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            type="text" placeholder="Type here to search...">

        <br>

        <table class="w-full">

           <thead>

            <tr>
                <th class="border p-1 text-center">Name</th>
                <th class="border p-1 text-center">Address</th>

            </tr>
            
        </thead>   
        
        <tbody>

        @foreach ( $employees as $employee)

<tr>
    <td class="border p-1">{{ $employee->fullname() }}  
        
        <a href="{{ route('employee',['employee_id'=>$employee->id]) }}">
            <button class="bg-green-300 p-2">View</button>
        </a>

        <button class="bg-green-300 p-2" wire:click="edit({{ $employee->id }})">Edit</button>


        

        <button class="bg-green-300 p-2" wire:click="delete({{ $employee->id }})">Delete</button>
    
    
    </td>
    <td class="border p-1">{{ $employee->PEA_subdivision }}</td>
</tr>
        
            
        @endforeach

    </tbody>

    </table>
       
    @include('livewire.modals.addemployeemodal')

    
    </div>


  
    
</div>
