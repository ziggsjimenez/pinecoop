<x-jet-dialog-modal wire:model="openDepositForm">
    <x-slot name="title">
        {{ $transactiontype }}
    </x-slot>

    <x-slot name="content">
        <form wire:submit.prevent="transact">
            @include('livewire.forms.deposit')
        </form>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('openDepositForm')" wire:loading.attr="disabled">
            Close
        </x-jet-secondary-button>
        <x-jet-button class="ml-2" wire:click="transact" wire:loading.attr="disabled">
            Submit
        </x-jet-button>
    </x-slot>
</x-jet-confirmation-modal>