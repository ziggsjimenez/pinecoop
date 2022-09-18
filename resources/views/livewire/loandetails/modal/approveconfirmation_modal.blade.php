<x-jet-dialog-modal wire:model="approveConfirmationModal">
    <x-slot name="title">
        Approve Loan 
    </x-slot>

    <x-slot name="content">

        <span class="font-bold text-2xl"> Are you sure you want to Appove this loan? </span>


    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('approveConfirmationModal')" wire:loading.attr="disabled">
            Close
        </x-jet-secondary-button>
        <x-jet-button class="ml-2" wire:click="approveMemberLoan" wire:loading.attr="disabled">
            Approve
        </x-jet-button>
    </x-slot>
</x-jet-confirmation-modal>