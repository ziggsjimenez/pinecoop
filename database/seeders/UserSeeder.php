<?php

namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jig Jimenez',
            'email' => 'juneljigjimenez@gmail.com',
            'password' => Hash::make('jigs'),
        ]);

        DB::table('users')->insert([
            'name' => 'Pinecoop',
            'email' => 'pinecoop@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
