<x-jet-dialog-modal wire:model="cashpaymentmodal">
    <x-slot name="title">
        Cash Payment
    </x-slot>

    <x-slot name="content">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="selectedRowMonthAmor">
            Enter Amount
        </label>
        <input wire:model="selectedRowMonthAmor" class="appearance-none block w-full bg-gray-100 text-gray-700 border   rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white" type="number" placeholder="Type here...">
        @error('selectedRowMonthAmor')
        <p class="text-red-500 text-xs italic">Amount must greater than {{ $this->arr_paymentsched[$this->selectedindex]['monthlyamort']}}</p>
        @enderror
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('cashpaymentmodal')" wire:loading.attr="disabled">
            Close
        </x-jet-secondary-button>
        <x-jet-button class="ml-2" wire:click="cashPaymentAction({{$this->selectedindex}})" wire:loading.attr="disabled">
            Continue
        </x-jet-button>
    </x-slot>
    </x-jet-confirmation-modal>