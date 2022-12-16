<x-jet-dialog-modal wire:model="showDeleteConfirmation">
    <x-slot name="title">
        Delete Loan 
    </x-slot>

    <x-slot name="content">

        <span class="font-bold text-2xl"> Are you sure you want to DELETE this loan? </span>


    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showDeleteConfirmation')" wire:loading.attr="disabled">
            Close
        </x-jet-secondary-button>
        <x-jet-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
            Delete
        </x-jet-button>
    </x-slot>
</x-jet-confirmation-modal>