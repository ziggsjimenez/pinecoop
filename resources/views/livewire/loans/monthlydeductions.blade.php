<div class="p-12">
    
    <div class="block">

        <select wire:model.defer="year">
            <option value="">Select year...</option>
            @php
                $tempyear=2022;
            @endphp
            @for ($x = 0; $x < 10; $x++)
                <option value="{{ $tempyear-$x }}">{{ $tempyear-$x }}</option>
            @endfor
            
        </select>

        <select wire:model.defer="month">
            <option value="">Select month...</option>
            <option value="1">January</option>
            <option value="2">Febuary</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>

        <button class="rounded p-1 text-sm font-bold bg-green-400 hover:bg-green-600 text-white" wire:click="show">Submit</button>



    </div>


</div>
