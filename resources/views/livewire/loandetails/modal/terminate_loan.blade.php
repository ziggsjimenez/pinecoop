<x-jet-dialog-modal wire:model="showTerminateLoanConfirmation">
    <x-slot name="title">
        Terminate Loan
    </x-slot>

    <x-slot name="content">
        <span class="font-bold text-2xl"> Terminate loan account? </span>


        @if($loan->latestPaymentSchedule()!=null)
        <div class="block">

            <table class="w-full w-1/2">
                <tr>
                    <td>Balance: </td>
                    <td class="text-right">Php {{ number_format($loan->latestPaymentSchedule()->balance,2,'.',',') }}</td>
                </tr>

                <tr>
                    <td>Interest: </td>
                    <td class="text-right">Php {{ number_format($terminationInterest,2,'.',',') }}</td>
                </tr>

                <tr>
                    <td class="font-bold">Total Amount: </td>
                    <td class="text-right font-bold">Php {{ number_format($this->totalTerminationAmount,2,'.',',') }}</td>
                </tr>
            </table> 
        
        </div>
        @endif

    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showTerminateLoanConfirmation')" wire:loading.attr="disabled">
            Close
        </x-jet-secondary-button>

        @if(!$loan->ispaid)
        <x-jet-button class="ml-2" wire:click="terminateLoan" wire:loading.attr="disabled">
            Continue
        </x-jet-button>
        @endif

    </x-slot>
</x-jet-confirmation-modal>