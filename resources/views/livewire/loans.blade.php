<div class="p-12">


    {{ $loan->member->fullname() }}

    <br>

    Loan Amount: Php {{ number_format($loan->loan_amount,2,'.',',') }} <br>
    Loan Type: {{ $loan->loantype->name }} <br>
    No. of Terms: {{ $loan->no_of_terms }} <br>
    Interest: {{ $loan->interest*100 }} %<br>
  

  <br>

 
 <x-jet-button> GENERATE PAYMENT SCHEDULE </x-jet-button>


</div>
