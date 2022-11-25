<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            EmployeeSeeder::class,
            AccountType::class,
            CapitalShareDeposits::class,
            CapitalShareJan2022::class,
            CapitalShareFeb2022::class,
            CapitalShareMar2022::class,
            CapitalShareApr2022::class,
            CapitalShareMay2022::class,
            LoantypeSeeder::class,
            NonCoopMember::class,
            NonCoopMemberCapitalShareDec2021::class,
        ]);
    }
}
