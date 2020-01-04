<?php

use Illuminate\Database\Seeder;

use App\Department;
use App\Employee;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $NA = new Department();
        $NA->name = 'N/A';
        $NA->description = 'Not Applicable';
        $NA->save();

        $Marketing = new Department();
        $Marketing->name = 'Marketing';
        $Marketing->description = 'A marketing department promotes your business and drives sales of its products or services';
        $Marketing->save();

        $Technical = new Department();
        $Technical->name = 'Technical';
        $Technical->description = 'Technical support (often shortened to tech support) refers to services that entities provide to users of technology products or services.';
        $Technical->save();

        $IT = new Department();
        $IT->name = 'IT';
        $IT->description = 'An IT organization (information technology organization) is the department within a company that is charged with establishing, monitoring and maintaining information technology systems and services.';
        $IT->save();
    }
}
