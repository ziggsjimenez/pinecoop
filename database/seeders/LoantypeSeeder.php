<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoantypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $loantypes = [
            ['name'=>'Regular 1','interest'=>0.03,'minsharecapital'=>1000,'minpaymentterms'=>12,'maxpaymentterms'=>24,'minloanamount'=>1000,'maxloanamount'=>50000,'minlengthofservice'=>0,'type'=>'Diminishing'],
            ['name'=>'Regular 2','interest'=>0.03,'minsharecapital'=>6000,'minpaymentterms'=>12,'maxpaymentterms'=>36,'minloanamount'=>51000,'maxloanamount'=>100000,'minlengthofservice'=>12,'type'=>'Diminishing'],
            ['name'=>'Regular 3','interest'=>0.03,'minsharecapital'=>18000,'minpaymentterms'=>12,'maxpaymentterms'=>60,'minloanamount'=>101000,'maxloanamount'=>150000,'minlengthofservice'=>36,'type'=>'Diminishing'],
            ['name'=>'Regular 4','interest'=>0.03,'minsharecapital'=>18000,'minpaymentterms'=>12,'maxpaymentterms'=>60,'minloanamount'=>151000,'maxloanamount'=>200000,'minlengthofservice'=>60,'type'=>'Diminishing'],
            ['name'=>'Special ','interest'=>0,'minsharecapital'=>30000,'minpaymentterms'=>24,'maxpaymentterms'=>24,'minloanamount'=>50000,'maxloanamount'=>50000,'minlengthofservice'=>120,'type'=>'Diminishing'],
            ['name'=>'Extended','interest'=>0.03,'minsharecapital'=>6000,'minpaymentterms'=>12,'maxpaymentterms'=>12,'minloanamount'=>5000,'maxloanamount'=>5000,'minlengthofservice'=>12,'type'=>'Diminishing'],
            
        
        ]; 

        foreach($loantypes as $loantype){
            DB::table('loantypes')->insert([
                'name' => $loantype['name'],
                'minsharecapital' => $loantype['minsharecapital'],
                'interest' => $loantype['interest'],
                'minpaymentterms' =>$loantype['minpaymentterms'],
                'maxpaymentterms' =>$loantype['maxpaymentterms'],
                'minlengthofservice' =>$loantype['minlengthofservice'],
                'minloanamount' => $loantype['minloanamount'],
                'maxloanamount' => $loantype['maxloanamount'],
                'type' => $loantype['type'],
            ]);
        }
    }
}
