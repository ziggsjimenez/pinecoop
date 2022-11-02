<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PRINT ACCOUNT</title>
</head>

<style>

    table {
      border-collapse: collapse;
      border: 1px solid;
    }
    
            .border {
                border: 1px solid;
            }
            .p-1{
                padding: 0.25rem;
            }
            .py-0{
                padding-top: 0px;
                padding-bottom: 0px;
            }
            .text-right{
                text-align: right;
            }
            .font-bold{
                font-weight: 700;
            }
        </style>


<body>

    PINECOOP<br>
    Camp Phillips, Agusan Canyon,<br>
    Manolo Fortich, Bukidnon<br>
    <br>
    <br>


    Name:  {{ $account->employee->fullname2() }}             <br>
    Address: {{ $account->employee->praddress() }} <br>
    Account Type:{{ $account->accounttype->name }}<br>
   


    @include('pdf.tables.accounts')
    
</body>
</html>