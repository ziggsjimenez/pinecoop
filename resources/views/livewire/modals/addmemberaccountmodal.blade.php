<x-jet-dialog-modal wire:model="modalmemberaccount">
    <x-slot name="title">
        Add account
    </x-slot>

    <x-slot name="content">
        <form wire:submit.prevent="saveMemberAccount">
            @include('livewire.forms.memberaccountform')
        </form>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('modalmemberaccount')" wire:loading.attr="disabled">
            Close
        </x-jet-secondary-button>
        <x-jet-button class="ml-2" wire:click="saveMemberAccount" wire:loading.attr="disabled">
            Submit
        </x-jet-button>
    </x-slot>
</x-jet-confirmation-modal>