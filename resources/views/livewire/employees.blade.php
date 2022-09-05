<div class="p-12">

    <div class="block bg-green-100 p-10">

        Employees <button wire:click="showAddModal"class="bg-green-300 hover:bg-green-800 p-2">Add</button>

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
       

    </div>

    Selected Employee: {{ $selectedEmployee }}



    @include('livewire.modals.addemployeemodal')
    
</div>
