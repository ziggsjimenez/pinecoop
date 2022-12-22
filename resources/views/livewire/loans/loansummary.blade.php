<div class="p-12">

    <div class="block pb-5 text-sm">
        Select Range ... From <input class="text-sm" wire:model="fromdate" type="date"> To <input class="text-sm"  wire:model="todate" type="date">
    </div>


    <div class="block">
        Amount Released: {{ number_format($loans->sum('amount'),2,'.',',') }} <br>

        @php
            $interestincome = 0;
        @endphp

        @foreach($loans as $loan)

            @php
                  $interestincome += $loan->amount*$loan->interest
            @endphp

        @endforeach
        
        Projected Interest Income: {{ number_format($loans->sum('interest'),2,'.',',') }} <br>
    </div>


    <div class="block">
        Collection <br>
        Principal: {{ number_format($payments->sum('principal'),2,'.',',') }} <br>
        Interest: {{ number_format($payments->sum('interest'),2,'.',',') }} <br> 
    </div>


    <div class="block">
        Collectibles: 
    </div>


</div>
