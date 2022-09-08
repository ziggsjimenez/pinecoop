<x-jet-dialog-modal wire:model="modaladdloantype" maxWidth="7xl">
    <x-slot name="title">
        Add Loan Type 
    </x-slot>

    <x-slot name="content">
        <form wire:submit.prevent="saveLoanTypes">
            @include('livewire.forms.loantypeaddform')
        </form>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('modaladdloantype')" wire:loading.attr="disabled">
            Close
        </x-jet-secondary-button>

        <x-jet-button class="ml-2" wire:click="saveLoanTypes" wire:loading.attr="disabled">
            Submit
        </x-jet-button>
    </x-slot>
</x-jet-confirmation-modal>