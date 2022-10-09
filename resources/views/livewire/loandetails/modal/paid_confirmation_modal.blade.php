<x-jet-dialog-modal wire:model="paidPaymentConfirmationModal">
    <x-slot name="title">
        Payment Paid
    </x-slot>

    <x-slot name="content">
        <span class="font-bold text-2xl"> This action cannot be undone. Are you sure you want to continue to Paid this payment? </span>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('paidPaymentConfirmationModal')" wire:loading.attr="disabled">
            Close
        </x-jet-secondary-button>
        <x-jet-button class="ml-2" wire:click="paidAction({{$this->selectedindex}})" wire:loading.attr="disabled">
            Continue
        </x-jet-button>
    </x-slot>
</x-jet-confirmation-modal>