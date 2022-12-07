<div class="p-12">
    <div class="block">
        <span class="font-bold text-xl">ADD CAPITAL SHARES</span>

        <div class="block">
            Posting Date: <input type="date" wire:model="dateapplied">
            <button class="bg-blue-300 hover:bg-blue-400 rounded px-4 py-1 font-bold text-white" wire:click="SaveCapitalShares">Submit</button>

            <div wire:loading>
                Processing capital shares...<i class="fa-solid fa-spinner"></i>
            </div>

        </div>

        <div>

            @php
                $count=1; 
                $rowcount = intdiv(count($tempCapitalShares),4);
                $index=0;
            @endphp

            <div class="flex text-xs">

            @foreach($tempCapitalShares as $cs)

                        @if($count==1)
                        <div class="m-3 w-full">
                        @endif

                            @if($cs->amount>500)
                            <div class="block pb-2 border rounded m-2 bg-orange-200">
                            @else 
                            <div class="block pb-2 border rounded m-2">
                            @endif
                                <div class="w-full object-center">
                                    {{ $cs->employee->fullname2() }} - Php {{ $cs->amount }}
                                    <div class="float-right"><button class="bg-orange-300 p-1 rounded font-bold text-xs" wire:click="OpenEditForm({{ $cs->id }})"><i class="fa-regular fa-pen-to-square"></i></button></div>
                                    
                                </div>

                                @if($showEditForm==$cs->id)
                                <div> 
                                    <input type="number" wire:model="amount.{{ $cs->id }}" class="text-xs" size="6" wire:change="UpdateArrayValue({{ $cs->id }})"> 
                                    <button wire:change="UpdateArrayValue({{ $cs->id }})">Ok</button>
                                </div>
                                @endif
                        </div>
                            
                        @if($count==$rowcount)
                        </div>
                        @endif

                        @php
                            $count++;
                        @endphp

                        @if($count==($rowcount+1))
                        @php
                            $count=1; 
                        @endphp
                        @endif

                        @php
                            $index++;
                        @endphp
            @endforeach
        </div>
        </div>
                    
    </div>
</div>