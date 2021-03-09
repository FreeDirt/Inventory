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
        for ($i=1; $i < 255; $i++) { 
           DB::table('ipaddresses')->insert([
                'ip' => '192.168.88' . '.' . $i,
                'description' => 'Edit',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
       }
    }
}
