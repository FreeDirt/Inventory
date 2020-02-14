<?php

use Illuminate\Database\Seeder;

use App\Designation;
use App\Employee;

class DesignationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Programmer = new Designation();
        $Programmer->name = 'Programmer';
        $Programmer->description = 'Computer Programmers are tasked with designing and creating software programs';
        $Programmer->save();

        $Webdeveloper = new Designation();
        $Webdeveloper->name = 'Web developer';
        $Webdeveloper->description = 'Web Developer is responsible for the coding, design and layout of a website according to a company specifications.';
        $Webdeveloper->save();

        $Writer = new Designation();
        $Writer->name = 'Writer';
        $Writer->description = 'They often work as freelancers.';
        $Writer->save();
    }
}
