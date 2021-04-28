<?php

use Illuminate\Database\Seeder;

use App\Empstatus;

class EmpstatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employed = new Empstatus();
        $employed->status = 'Employed';
        $employed->save();

        $resigned = new Empstatus();
        $resigned->status = 'Resigned';
        $resigned->save();

        $training = new Empstatus();
        $training->status = 'Training';
        $training->save();

        $probationary = new Empstatus();
        $probationary->status = 'Probationary';
        $probationary->save();
    }
}
