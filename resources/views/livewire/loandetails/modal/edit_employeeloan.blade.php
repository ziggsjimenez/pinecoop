<x-jet-dialog-modal wire:model="showEditLoanModal">
    <x-slot name="title">
        Edit Loan
    </x-slot>

    <x-slot name="content">
        <form wire:submit.prevent="saveEditEmployeeLoan">
            @include('livewire.loandetails.forms.editloanform')
        </form>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('showEditLoanModal')" wire:loading.attr="disabled">
            Close
        </x-jet-secondary-button>
        <x-jet-button class="ml-2" wire:click="editLoan" wire:loading.attr="disabled">
            Submit
        </x-jet-button>
    </x-slot>
</x-jet-confirmation-modal>