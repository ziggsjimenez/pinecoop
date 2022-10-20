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
            [
                'name' => 'Regular',
                'interest' => .01,
                'minpaymentterms' => 12,
                'maxpaymentterms' => 24,
                'minloanamount' => 10000,
                'maxloanamount' => 50000,
                'type' => 'Diminishing',
            ],
            [
                'name' => 'Special',
                'interest' => .01,
                'minpaymentterms' => 12,
                'maxpaymentterms' => 24,
                'minloanamount' => 10000,
                'maxloanamount' => 50000,
                'type' => 'Diminishing',
            ],
        ]; 

        foreach($loantypes as $loantype){
            DB::table('loantypes')->insert([
                'name' => $loantype['name'],
                'interest' => $loantype['interest'],
                'minpaymentterms' =>$loantype['minpaymentterms'],
                'maxpaymentterms' =>$loantype['maxpaymentterms'],
                'minloanamount' => $loantype['minloanamount'],
                'maxloanamount' => $loantype['maxloanamount'],
                'type' => $loantype['type'],
            ]);
        }
    }
}
