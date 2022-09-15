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
                'paymentterms' => 24,
                'maxloanammount' => 50000,
                'type' => 'Diminishing',
            ],
            [
                'name' => 'Special',
                'interest' => .01,
                'paymentterms' => 12,
                'maxloanammount' => 25000,
                'type' => 'Diminishing',
            ],
        ]; 

        foreach($loantypes as $loantype){
            DB::table('loantypes')->insert([
                'name' => $loantype['name'],
                'interest' => $loantype['interest'],
                'paymentterms' =>$loantype['paymentterms'],
                'maxloanammount' => $loantype['maxloanammount'],
                'type' => $loantype['type'],
            ]);
        }
    }
}
