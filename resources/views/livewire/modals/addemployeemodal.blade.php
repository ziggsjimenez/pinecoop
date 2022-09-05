<x-jet-confirmation-modal wire:model="openAddModal">
    <x-slot name="title">
        Employee 
    </x-slot>

    <x-slot name="content">

        <label for="">Lastname</label>

        <input type="text" wire:model="Lastname">

        @error('Lastname')

        <span class="text-red-600 font-bold">Please input lastname.</span> 
            
        @enderror
        
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('openAddModal')" wire:loading.attr="disabled">
            Nevermind
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="storeEmployee" wire:loading.attr="disabled">
            Submit
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal>