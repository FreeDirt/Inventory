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
        $NA = new Company();
        $NA->name = 'N/A';
        $NA->description = 'Not Applicable';
        $NA->save();

        $FCA = new Company();
        $FCA->name = 'FCA';
        $FCA->description = 'Flood Control Asia RS';
        $FCA->save();

        $KPH = new Company();
        $KPH->name = 'KPH';
        $KPH->description = 'Dr. Klippe Philippines Corporation';
        $KPH->save();

        $KTV = new Company();
        $KTV->name = 'KTV';
        $KTV->description = 'Klipp TV';
        $KTV->save();
    }
}
