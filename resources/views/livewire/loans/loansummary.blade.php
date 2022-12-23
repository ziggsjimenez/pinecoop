<div class="p-12">

    <div class="block pb-5 text-sm">
        Select Range ... From <input class="text-sm" wire:model="fromdate" type="date"> To <input class="text-sm"  wire:model="todate" type="date">
    </div>


    <div class="block">

        <table class="w-1/4">
            <tr>
                <td class="border p-1">Amount Released: </td><td class="border p-1 text-right">{{ number_format($loans->sum('amount'),2,'.',',') }}</td>
            </tr>
            <tr>
                <td class="border p-1"> Projected Interest Income: </td><td class="border p-1 text-right"> {{ number_format($projectedInterestIncome,2,'.',',') }}</td>
            </tr>

        </table>

    </div>


    <div class="block">
        <span class="font-bold text-xl">Collection</span>     <br>

        <table class="w-1/4">
            <tr>
                <td class="border p-1">Principal: </td><td class="border p-1 text-right">{{ number_format($payments->sum('principal'),2,'.',',') }}</td>
            </tr>
            <tr>
                <td class="border p-1">Interest:</td><td class="border p-1 text-right">{{ number_format($payments->sum('interest'),2,'.',',') }}</td>
            </tr>

            <tr>
                <td class="border p-1">Total:</td><td class="border p-1 text-right">{{ number_format($payments->sum('interest')+$payments->sum('principal'),2,'.',',') }}</td>
            </tr>

        </table>

    </div>


    <div class="block">
        <span class="font-bold text-xl">Collectibles: </span>     <br>

        <table class="w-1/4">
            <tr>
                <td class="border p-1">Principal: </td><td class="border p-1 text-right">{{ number_format( $collectibles->sum('principal'),2,'.',',') }}</td>
            </tr>
            <tr>
                <td class="border p-1">Interest:</td><td class="border p-1 text-right">{{ number_format($collectibles->sum('interest'),2,'.',',') }}</td>
            </tr>

            <tr>
                <td class="border p-1">Total Amortizations:</td><td class="border p-1 text-right">{{ number_format($collectibles->sum('monthlyamort'),2,'.',',') }}</td>
            </tr>

        </table>
    </div>


</div>
