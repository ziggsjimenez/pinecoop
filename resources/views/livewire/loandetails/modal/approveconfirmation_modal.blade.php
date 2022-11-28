<x-jet-dialog-modal wire:model="showApproveLoanModal">
    <x-slot name="title">
        Approve Loan 
    </x-slot>

    <x-slot name="content">

        <span class="font-bold text-2xl"> Are you sure you want to APPROVE this loan? </span>


    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showApproveLoanModal')" wire:loading.attr="disabled">
            Close
        </x-jet-secondary-button>
        <x-jet-button class="ml-2" wire:click="approveLoan" wire:loading.attr="disabled">
            Approve
        </x-jet-button>
    </x-slot>
</x-jet-confirmation-modal>