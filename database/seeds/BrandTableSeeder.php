<?php

use Illuminate\Database\Seeder;
use App\Brand;
use App\Inventory;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $samsung = new Brand();
        $samsung->name = 'Samsung';
        $samsung->save();

        $logitech = new Brand();
        $logitech->name = 'Logitech';
        $logitech->save();

        $lacie = new Brand();
        $lacie->name = 'Lacie';
        $lacie->save();

        $a4tech = new Brand();
        $a4tech->name = 'A4tech';
        $a4tech->save();

        $apple = new Brand();
        $apple->name = 'Apple';
        $apple->save();

        $vivo = new Brand();
        $vivo->name = 'Vivo';
        $vivo->save();

        $huawei = new Brand();
        $huawei->name = 'Huawei';
        $huawei->save();

        $sandisk = new Brand();
        $sandisk->name = 'Sandisk';
        $sandisk->save();

        $eneloop = new Brand();
        $eneloop->name = 'Eneloop';
        $eneloop->save();

        $apc = new Brand();
        $apc->name = 'APC';
        $apc->save();

    }
}
