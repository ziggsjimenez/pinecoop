<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class NonCoopMemberCapitalShareDec2021 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactions = [
            ['account_id'=>392,'amount'=>2575,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>393,'amount'=>10040,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>394,'amount'=>7805,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>395,'amount'=>8540,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>396,'amount'=>10040,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>397,'amount'=>4240,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>398,'amount'=>12390,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>399,'amount'=>6540,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>400,'amount'=>4510,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>401,'amount'=>10040,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>402,'amount'=>2410,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>403,'amount'=>9540,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>404,'amount'=>10000,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>405,'amount'=>9840,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>406,'amount'=>7130,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>407,'amount'=>5590,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>408,'amount'=>9175,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>409,'amount'=>3460,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>410,'amount'=>3470,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>411,'amount'=>7640,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>412,'amount'=>6480,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>413,'amount'=>9340,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>414,'amount'=>2440,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>415,'amount'=>0,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>416,'amount'=>10240,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>417,'amount'=>8210,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>418,'amount'=>10000,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>419,'amount'=>9175,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>420,'amount'=>10140,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>421,'amount'=>6127,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>422,'amount'=>0,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>423,'amount'=>0,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>424,'amount'=>10540,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>425,'amount'=>9920,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>426,'amount'=>16790,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>427,'amount'=>6000,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>428,'amount'=>0,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>429,'amount'=>10035,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>430,'amount'=>8650,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>431,'amount'=>5590,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>432,'amount'=>5910,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>433,'amount'=>4695,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>434,'amount'=>3573,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>435,'amount'=>40,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>436,'amount'=>6500,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>437,'amount'=>10040,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>438,'amount'=>13940,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>439,'amount'=>9320,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>440,'amount'=>1400,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>441,'amount'=>10040,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>442,'amount'=>2290,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>443,'amount'=>10040,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>444,'amount'=>7640,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>445,'amount'=>4940,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>446,'amount'=>7640,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>447,'amount'=>3205,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>448,'amount'=>2440,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>449,'amount'=>600,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>450,'amount'=>10000,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>451,'amount'=>8940,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>452,'amount'=>10190,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>453,'amount'=>10190,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>454,'amount'=>10030,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>455,'amount'=>10000,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>456,'amount'=>8475,'dateoftransaction'=>'2021-12-31'],
            ['account_id'=>457,'amount'=>4360,'dateoftransaction'=>'2021-12-31'],            
        ];

        foreach ($transactions as $transaction) {

            if ($transaction['amount'] != 0) {
                DB::table('transactions')->insert([
                    'transaction_reference_number' => "CAP" . "20211231" . Str::padLeft($transaction['account_id'], 5, '0'),
                    'amount' => $transaction['amount'],
                    'dateoftransaction' => $transaction['dateoftransaction'],
                    'account_id' => $transaction['account_id'],
                    'user_id' => 1,
                ]);
            }
        }
    }
}
