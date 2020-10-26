<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert(
            [
                ['name'=>'Alberta','abrev'=>'AB','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
                ['name'=>'British Columbia','abrev'=>'BC','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
                ['name'=>'Manitoba','abrev'=>'MB','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
                ['name'=>'New Brunswick','abrev'=>'NB','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
                ['name'=>'Newfoundland and Labrador','abrev'=>'NL','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
                ['name'=>'Northwest Territories','abrev'=>'NT','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
                ['name'=>'Nova Scotia','abrev'=>'NS','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
                ['name'=>'Nunavut','abrev'=>'NU','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
                ['name'=>'Ontario','abrev'=>'ON','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
                ['name'=>'Prince Edward Island','abrev'=>'PE','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
                ['name'=>'Quebec','abrev'=>'QC','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
                ['name'=>'Saskatchewan','abrev'=>'SK','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
                ['name'=>'Yukon','abrev'=>'YT','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
            ]);
    }
}
