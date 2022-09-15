<x-jet-dialog-modal wire:model="showConfirmChangeStatusModal">
    <x-slot name="title">
        Change Status 
    </x-slot>

    <x-slot name="content">

        <span class="font-bold text-2xl"> Confirm to change status.. </span>


    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showConfirmChangeStatusModal')" wire:loading.attr="disabled">
            Close
        </x-jet-secondary-button>
        <x-jet-button class="ml-2" wire:click="changeStatus({{ $employee_id }})" wire:loading.attr="disabled">
            Submit
        </x-jet-button>
    </x-slot>
</x-jet-confirmation-modal>