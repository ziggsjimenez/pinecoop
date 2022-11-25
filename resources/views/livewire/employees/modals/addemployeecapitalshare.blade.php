<x-jet-dialog-modal wire:model="showAddCapitalShares">
    <x-slot name="title">
        Deposit
    </x-slot>

    <x-slot name="content">

        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="amount">
                Amount
            </label>
            <input wire:model="amount"
                class="appearance-none block w-full bg-gray-100 text-gray-700 border   rounded py-2 px-4 mb-2 leading-tight focus:outline-none focus:bg-white"
                type="number">
        </div>

    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showAddCapitalShares')" wire:loading.attr="disabled">
            Close
        </x-jet-secondary-button>
        <x-jet-button class="ml-2" wire:click="saveEmplCapitalShare({{ $employee->id }})" wire:loading.attr="disabled">
            Submit
        </x-jet-button>
    </x-slot>
    </x-jet-confirmation-modal>
