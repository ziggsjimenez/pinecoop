<x-jet-dialog-modal wire:model="openPaymentModal">
    <x-slot name="title">
        Cash Payment
    </x-slot>

    <x-slot name="content">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="paymentAmount">
            Enter Amount
        </label>
        <input wire:model.defer="paymentAmount" class="appearance-none block w-full bg-gray-100 text-gray-700 border   rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white" type="number" placeholder="Type here...">
        @error('paymentAmount')
        <p class="text-red-500 text-xs italic">{{ $message}}</p>
        @enderror
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('openPaymentModal')" wire:loading.attr="disabled">
            Close
        </x-jet-secondary-button>
        <x-jet-button class="ml-2" wire:click="processPayment" wire:loading.attr="disabled">
            Continue
        </x-jet-button>
    </x-slot>
    </x-jet-confirmation-modal>