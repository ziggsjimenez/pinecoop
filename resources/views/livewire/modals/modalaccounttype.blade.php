<x-jet-dialog-modal wire:model="modalaccounttype" maxWidth="7xl">
    <x-slot name="title">
        Add Account Type 
    </x-slot>

    <x-slot name="content">
        <form wire:submit.prevent="saveAccountType">
            @include('livewire.forms.accounttypeform')
        </form>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('modalaccounttype')" wire:loading.attr="disabled">
            Close
        </x-jet-secondary-button>

        <x-jet-button class="ml-2" wire:click="saveAccountType" wire:loading.attr="disabled">
            Submit
        </x-jet-button>
    </x-slot>
</x-jet-confirmation-modal>