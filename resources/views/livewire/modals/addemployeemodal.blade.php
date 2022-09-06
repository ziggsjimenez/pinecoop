<x-jet-dialog-modal wire:model="openAddModal" maxWidth="7xl">
    <x-slot name="title">
        Employee 
    </x-slot>

    <x-slot name="content">

        <form wire:submit.prevent="saveContact">
        @include('livewire.forms.employee')
        </form>

        
        
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('openAddModal')" wire:loading.attr="disabled">
            Nevermind
        </x-jet-secondary-button>

        <x-jet-button class="ml-2" wire:click="storeEmployee" wire:loading.attr="disabled">
            Submit
        </x-jet-button>
    </x-slot>
</x-jet-confirmation-modal>