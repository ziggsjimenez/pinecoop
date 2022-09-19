<x-jet-dialog-modal wire:model="modaleditemployeeloan">
    <x-slot name="title">
        Edit Employee loan
    </x-slot>

    <x-slot name="content">
        <form wire:submit.prevent="saveEditEmployeeLoan">
            @include('livewire.loandetails.forms.editloanform')
        </form>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('modaleditemployeeloan')" wire:loading.attr="disabled">
            Close
        </x-jet-secondary-button>
        <x-jet-button class="ml-2" wire:click="saveEditEmployeeLoan" wire:loading.attr="disabled">
            Submit
        </x-jet-button>
    </x-slot>
</x-jet-confirmation-modal>