<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounttypes = [
            ['name'=>'Savings'],
            ['name'=>'Capital Share'],
        ]; 

        foreach($accounttypes as $accounttype){
            DB::table('accounttypes')->insert([
               'name'=>$accounttype['name'],
            ]);
        }


    }
}
