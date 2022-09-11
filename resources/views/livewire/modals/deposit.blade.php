<x-jet-dialog-modal wire:model="openDepositForm">
    <x-slot name="title">
        Add account type 
    </x-slot>

    <x-slot name="content">
        <form wire:submit.prevent="deposit">
            @include('livewire.forms.deposit')
        </form>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('openDepositForm')" wire:loading.attr="disabled">
            Close
        </x-jet-secondary-button>
        <x-jet-button class="ml-2" wire:click="deposit" wire:loading.attr="disabled">
            Submit
        </x-jet-button>
    </x-slot>
</x-jet-confirmation-modal>