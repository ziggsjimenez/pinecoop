<div>

    @include('livewire.includes.messages')
    
    Account Name: {{ $account->member->fullname() }}
    <br>
    <!-- Account Type:  {{ $account->type->name }} -->

    <br>
    Balance: {{ $account->balance() }}

    <hr>


    <br>
    Transactions 
    <x-jet-button wire:click="showTransactionForm('Deposit')">Deposit</x-jet-button>
    <x-jet-button wire:click="showTransactionForm('Withdraw')">Withdraw</x-jet-button>

    <hr>

    @include('livewire.tables.transactions')


    @include('livewire.modals.deposit')
    

</div>
