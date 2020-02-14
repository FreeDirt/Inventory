<?php

use Illuminate\Database\Seeder;
use App\Country;
use App\Employee;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $PH = new Country();
        $PH->name = 'Philippines';
        $PH->save();

        $DE = new Country();
        $DE->name = 'Germany';
        $DE->save();
    }
}
