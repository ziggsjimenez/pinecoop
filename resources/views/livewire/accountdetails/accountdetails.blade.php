<div class="p-12">

    @include('livewire.includes.messages')

    <div class="block">
        Account Name: {!! $account->employee->fullname() !!}

        <br>
        Account Type:  {{ $account->type->name }}
    
        <br>
        Balance: Php {{ number_format($account->balance(),2,'.',',') }}
    
    </div>
    
    Transactions

    <x-jet-button wire:click="showTransactionForm('Deposit')">Deposit</x-jet-button>
   
    @if($account->employee->isActive() && $account->accounttype->name=="Savings")
    <x-jet-button wire:click="showTransactionForm('Withdraw')">Withdraw</x-jet-button>
    @endif

    @if(!$account->employee->isActive() && $account->accounttype->name=="Capital Share")
    <x-jet-button wire:click="showTransactionForm('Withdraw')">Withdraw</x-jet-button>
    @endif

    @if(!$account->employee->isActive() && $account->accounttype->name=="Savings")
    <x-jet-button wire:click="showTransactionForm('Withdraw')">Withdraw</x-jet-button>
    @endif

    <hr>

    @include('livewire.tables.transactions')

    @include('livewire.modals.deposit')
    
</div>
