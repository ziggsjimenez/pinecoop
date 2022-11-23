<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $employees = [
            [
                'lastname'=>'Jimenez',
                'firstname'=>'Junel Jig',
                'middlename' => 'Garcia',
                'extension' => '',
                'birthdate' => '2022-09-15',
                'civilstatus' => 'Married',
                'sex' => 'Male',
                'religion' => 'Roman Catholic',
                'department' => 'Spray',
                'position' => 'Supervisor',
                'employmentdate' => '2000-01-01',
                'phonenumber' => '09055740562',
                'educationalattainment' => 'College Graduate',
                'estimatedannualgross' => 150000,
                'tin' => '56898758',
                'prahouseno' => 'Block 5 Lot 11',
                'prabuildingstreet' => '',
                'prasubdivision' => 'Cristanvilla',
                'prabarangay' => 'Dicklum',
                'pramun' => 'Manolo Fortich',
                'praprov' => 'Bukidnon',
                'prazipcode' => '8703',
                'peahouseno' => 'Block 5 Lot 11',
                'peabuildingstreet' => '',
                'peasubdivision' => 'Cristanvilla',
                'peabarangay' => 'Dicklum',
                'peamun' => 'Manolo Fortich',
                'peaprov' => 'Bukidnon',
                'peazipcode' => '8703',
                'pmailadd' => 'Residential',
                'email' => 'juneljigjimenez@gmail.com',
                'fbaccount' => 'ziggsjimenez',
                'ispinecoopmem' => 1,
                'dateofmembership' => '2022-01-01',
                'pwdid' =>'',
                'ispersonwithdisability' => 0,
                'chapanumber' => '21564',
                'status' =>'Active'
            ],
        ];

        foreach($employees as $employee){
            DB::table('employees')->insert([
                'lastname' => $employee['lastname'],
                'firstname' => $employee['firstname'],
                'middlename' => $employee['middlename'],
                'extension' => $employee['extension'],
                'birthdate' => $employee['birthdate'],
                'civilstatus' => $employee['civilstatus'],
                'sex' => $employee['sex'],
                'religion' => $employee['religion'],
                'department' => $employee['department'],
                'position' => $employee['position'],
                'employmentdate' => $employee['employmentdate'],
                'phonenumber' => $employee['phonenumber'],
                'educationalattainment' => $employee['educationalattainment'],
                'estimatedannualgross' => $employee['estimatedannualgross'],
                'tin' => $employee['tin'],
                'prahouseno' => $employee['prahouseno'],
                'prabuildingstreet' => $employee['prabuildingstreet'],
                'prasubdivision' => $employee['prasubdivision'],
                'prabarangay' => $employee['prabarangay'],
                'pramun' => $employee['pramun'],
                'praprov' => $employee['praprov'],
                'prazipcode' => $employee['prazipcode'],
                'peahouseno' => $employee['peahouseno'],
                'peabuildingstreet' => $employee['peabuildingstreet'],
                'peasubdivision' => $employee['peasubdivision'],
                'peabarangay' => $employee['peabarangay'],
                'peamun' => $employee['peamun'],
                'peaprov' => $employee['peaprov'],
                'peazipcode' => $employee['peazipcode'],
                'pmailadd' => $employee['pmailadd'],
                'email' => $employee['email'],
                'fbaccount' => $employee['fbaccount'],
                'ispinecoopmem' => $employee['ispinecoopmem'],
                'dateofmembership' => $employee['dateofmembership'],
                'pwdid' => $employee['pwdid'],
                'ispersonwithdisability' => $employee['ispersonwithdisability'],
                'chapanumber' => $employee['chapanumber'],
                'status' => $employee['status'],
            ]);
        }

       
    }
}
