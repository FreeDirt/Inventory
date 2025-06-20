<?php

use Illuminate\Database\Seeder;
use App\Company;
use App\Employee;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $KPH = new Company();
        $KPH->name = 'company 1';
        $KPH->description = 'Company 1';
        $KPH->save();
        
        $FCA = new Company();
        $FCA->name = 'Company 2';
        $FCA->description = 'Company 2';
        $FCA->save();

        $KTV = new Company();
        $KTV->name = 'Company 3';
        $KTV->description = 'Company 3';
        $KTV->save();
    }
}
