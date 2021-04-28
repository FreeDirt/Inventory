<?php

use Illuminate\Database\Seeder;

use App\Parentcat;

class ParentcatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $monitor = new Parentcat();
        $monitor->name = 'Monitor';
        $monitor->save();

        $peripherals = new Parentcat();
        $peripherals->name = 'Peripherals';
        $peripherals->save();

        $mobile_devices = new Parentcat();
        $mobile_devices->name = 'Mobile devices';
        $mobile_devices->save();

        $electronics = new Parentcat();
        $electronics->name = 'Electronics';
        $electronics->save();

        $supplies = new Parentcat();
        $supplies->name = 'Supplies';
        $supplies->save();

        $computer = new Parentcat();
        $computer->name = 'Computer';
        $computer->save();

    }
}
