<x-jet-dialog-modal wire:model="terminateConfirmationModal">
    <x-slot name="title">
        Terminate Loan 
    </x-slot>

    <x-slot name="content">

        <span class="font-bold text-2xl"> Are you sure you want to Terminate this loan?</span>


    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('terminateConfirmationModal')" wire:loading.attr="disabled">
            Close
        </x-jet-secondary-button>
        <x-jet-button class="ml-2" wire:click="terminateLoanAccount()" wire:loading.attr="disabled">
            Terminate
        </x-jet-button>
    </x-slot>
</x-jet-confirmation-modal>