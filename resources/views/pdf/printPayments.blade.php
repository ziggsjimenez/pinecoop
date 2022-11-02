<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SOA</title>
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

</head>
<body>

    <div>

        PINECOOP<br>
        Camp Phillips, Agusan Canyon,<br>
        Manolo Fortich, Bukidnon<br>
        <br>
        <br>


        
        @include('pdf.tables.payments')



        <br><br><br>

        Prepared by: <br><br><br>

        JUNEL JIG G. JIMENEZ <br>
        Loan Officer 
        <br><br><br>

     



        Conforme: <br><br><br>


        {{ $loan->employee->fullname2() }} <br>
        



        
    

    </div>
    
</body>
</html>
