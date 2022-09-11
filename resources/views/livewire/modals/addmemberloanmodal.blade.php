<x-jet-dialog-modal wire:model="modalmemberloan">
    <x-slot name="title">
        Add loan
    </x-slot>

    <x-slot name="content">
        <form wire:submit.prevent="saveMemberLoan">
            @include('livewire.forms.memberlaonform')
        </form>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('modalmemberloan')" wire:loading.attr="disabled">
            Close
        </x-jet-secondary-button>
        <x-jet-button class="ml-2" wire:click="saveMemberLoan" wire:loading.attr="disabled">
            Submit
        </x-jet-button>
    </x-slot>
</x-jet-confirmation-modal>