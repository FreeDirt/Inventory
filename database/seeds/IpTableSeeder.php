<?php

use Illuminate\Database\Seeder;

use App\Ipaddress;
use App\Employee;

class IpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $NA = new Ipaddress();
        $NA->ip = 'N/A';
        $NA->description = 'Not Applicable';
        $NA->save();

        $rysip = new Ipaddress();
        $rysip->ip = '192.168.88.32';
        $rysip->description = 'Ryan Mendoza Currently use this IP.';
        $rysip->save();
    }
}
